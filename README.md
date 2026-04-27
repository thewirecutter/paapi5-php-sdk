# Amazon Creators API PHP SDK

[![Version](https://img.shields.io/packagist/v/thewirecutter/paapi5-php-sdk)](https://packagist.org/packages/thewirecutter/paapi5-php-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/thewirecutter/paapi5-php-sdk.svg?style=flat)](https://packagist.org/packages/thewirecutter/paapi5-php-sdk)
[![CircleCI](https://circleci.com/gh/thewirecutter/paapi5-php-sdk.svg?style=svg)](https://circleci.com/gh/thewirecutter/paapi5-php-sdk)

This repository contains the open source PHP SDK that allows you to access the [Amazon Creators API](https://affiliate-program.amazon.com/creatorsapi) from your PHP app.

> **Note:** This package was previously the PAAPI5 PHP SDK. As of v2.0.0 it has been migrated to wrap Amazon's Creators API PHP SDK. Existing consumers should update their namespace references from `Amazon\ProductAdvertisingAPI\v1\` to `Amazon\CreatorsAPI\v1\` and switch from AWS Signature V4 credentials to OAuth 2.0 credentials (Client ID, Client Secret, Version).

## Copy of Amazon's Provided Code

This is a near-identical public copy of [Amazon's provided Creators API PHP SDK](https://affiliate-program.amazon.com/creatorsapi), as their version is not available through Packagist. The Composer package name remains `thewirecutter/paapi5-php-sdk` for backwards compatibility with existing consumers.

We have not changed the API behavior in any way. A listing of our additions and changes are provided below, which primarily enforce a code-sniff standard and support running an continuous integration pipeline.

### Changes from Amazon

* Added `squizlabs/php_codesniffer` dev dependency and PSR-2 CI linting.
* Updated CircleCI configuration for automated builds.
* Upgraded `friendsofphp/php-cs-fixer` to `^3.5` with updated `.php_cs` config.
* Added integration tests that run the example scripts and verify they execute without any errors.
* Added typehints to method signatures where possible (without breaking backwards compatibility).
* Exposed the `DefaultApi`'s `buildAuthenticatedTokens()` method as protected so it can be overridden for caching tokens (see below for example).

## Installation

The Creators API PHP SDK can be installed with [Composer](https://getcomposer.org/). The SDK is available via [Packagist](http://packagist.org/) under the [`thewirecutter/paapi5-php-sdk`](https://packagist.org/packages/thewirecutter/paapi5-php-sdk) package.

```sh
composer require thewirecutter/paapi5-php-sdk
```

## Requirements

- PHP 8.1 or greater
- Guzzle 7.3+
- Amazon Creators API credentials: Client ID, Client Secret, and Version

## Authentication

This SDK uses **OAuth 2.0** (not AWS Signature V4). You will need:

- **Credential ID** (Client ID) — from the Amazon Associates program
- **Credential Secret** (Client Secret)
- **Version** — the credential version string
- **Marketplace** — e.g. `www.amazon.com`
- **Partner Tag** — your Amazon Associates tracking ID

The SDK handles token caching automatically via `OAuth2TokenManager`. This caching only persists as long as the same instance of `DefaultApi` is used.

## Usage

Simple example for [GetItems](https://affiliate-program.amazon.com/creatorsapi/docs/en-us/api-reference/operations/get-items) to retrieve product details for specific ASINs:

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Amazon\CreatorsAPI\v1\Configuration;
use Amazon\CreatorsAPI\v1\com\amazon\creators\api\DefaultApi;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetItemsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetItemsResource;
use Amazon\CreatorsAPI\v1\ApiException;

$config = new Configuration();
$config->setCredentialId('<YOUR CREDENTIAL ID>');
$config->setCredentialSecret('<YOUR CREDENTIAL SECRET>');
$config->setVersion('<YOUR CREDENTIAL VERSION>');

$api = new DefaultApi(null, $config);

$marketplace = 'www.amazon.com';

$resources = [
    GetItemsResource::IMAGES_PRIMARY_MEDIUM,
    GetItemsResource::ITEM_INFO_TITLE,
    GetItemsResource::OFFERS_V2_LISTINGS_PRICE,
];

$request = new GetItemsRequestContent();
$request->setPartnerTag('<YOUR PARTNER TAG>');
$request->setItemIds(['B0DLFMFBJW', 'B0BFC7WQ6R']);
$request->setResources($resources);

try {
    $response = $api->getItems($marketplace, $request);
    echo 'API called successfully' . PHP_EOL;
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
} catch (ApiException $e) {
    echo 'Error calling Creators API!' . PHP_EOL;
    echo $e . PHP_EOL;
} catch (Exception $e) {
    echo 'Unexpected error: ' . $e . PHP_EOL;
}
```

See the `examples/` directory for additional sample scripts covering all supported operations:

- `SampleGetItems.php`
- `SampleSearchItems.php`
- `SampleGetVariations.php`
- `SampleGetBrowseNodes.php`
- `SampleGetFeed.php`
- `SampleGetReport.php`
- `SampleListFeeds.php`
- `SampleListReports.php`

Complete API documentation is available at [https://affiliate-program.amazon.com/creatorsapi](https://affiliate-program.amazon.com/creatorsapi).

## Caching Tokens

The `DefaultApi` class caches OAuth2 tokens in memory for the duration of the instance. To implement a more persistent caching mechanism (e.g. file-based, Redis, etc.), you can extend `DefaultApi` and override the `buildAuthenticatedTokens()` method to first check your cache before making a request to Amazon's token endpoint.

Example code snippet for improved caching:

```php
class CachedApi extends DefaultApi
{
    public function __construct(
        private readonly cachingTokenManager $cachingTokenManager, // Inject the caching token manager
        ?ClientInterface                     $client = null,
        ?Configuration                       $config = null,
        ?HeaderSelector                      $selector = null,
        int                                  $hostIndex = 0
    ) {
        parent::__construct($client, $config, $selector, $hostIndex);
    }

    protected function buildAuthenticatedHeaders(string $resourcePath): array
    {
        $token   = $this->cachingTokenManager->getToken(); // Get the cached token (or fetch a new one if expired)
        $version = $this->config->getVersion();

        if (str_starts_with($version, '3.')) {
            return ['Authorization' => "Bearer {$token}"];
        }

        return ['Authorization' => "Bearer {$token}, Version {$version}"];
    }

    public function clearToken(): void
    {
        $this->cachingTokenManager->clearToken();
    }
}

class CachingTokenManager extends OAuth2TokenManager
{
    // NOTE: Cache is used here as pseudocode. You can implement your own caching logic using files, Redis, Memcached, etc.

    private const string CACHE_KEY = 'amazon_unique_token_cache_key'; // Use a unique cache key for your token
    private const int CACHE_FRESH_MINUTES = 50; // Time in minutes to consider the cached token "fresh" and safe to use without triggering background refresh.
    private const int CACHE_TTL_MINUTES = 55; // Time in minutes to consider the cached token valid before it must be refreshed (should be less than the actual token expiration time)

    public function getToken(): string
    {
        // Cache::flexible() will return the cached token if it exists and is not expired.
        // If the token is expired or doesn't exist, it will call the provided callback to fetch a new token, store it in the cache, and return it.
        return Cache::flexible(
            self::CACHE_KEY,
            [now()->addMinutes(self::CACHE_FRESH_MINUTES), now()->addMinutes(self::CACHE_TTL_MINUTES)],
            fn() => parent::getToken() // You may want to wrap parent::getToken() in a helper method that can mock the return for testing.
        );
    }

    public function clearToken(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
```

## License

This SDK is distributed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0), see LICENSE.txt and NOTICE.txt for more information.
