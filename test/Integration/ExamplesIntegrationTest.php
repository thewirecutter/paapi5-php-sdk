<?php
/**
 * Copyright 2025 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Amazon\CreatorsAPI\v1\Test\Integration;

use Amazon\CreatorsAPI\v1\ApiException;
use Amazon\CreatorsAPI\v1\Configuration;
use Amazon\CreatorsAPI\v1\com\amazon\creators\api\DefaultApi;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetBrowseNodesRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetBrowseNodesResource;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetFeedRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetItemsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetItemsResource;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetReportRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetVariationsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetVariationsResource;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\SearchItemsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\SearchItemsResource;
use PHPUnit\Framework\TestCase;

/**
 * Integration tests mirroring the examples in /examples.
 *
 * Requires credentials set via phpunit.integration.xml (copy from phpunit.integration.xml.dist).
 * Run with: composer test:integration
 */
class ExamplesIntegrationTest extends TestCase
{
    private static ?DefaultApi $api = null;
    private static string $marketplace = '';
    private static string $partnerTag = '';

    public static function setUpBeforeClass(): void
    {
        $credentialId     = (string) getenv('CREATORS_API_CREDENTIAL_ID');
        $credentialSecret = (string) getenv('CREATORS_API_CREDENTIAL_SECRET');
        $version          = (string) getenv('CREATORS_API_CREDENTIAL_VERSION');
        $marketplace      = (string) getenv('CREATORS_API_MARKETPLACE');
        $partnerTag       = (string) getenv('CREATORS_API_PARTNER_TAG');

        if (!$credentialId || !$credentialSecret || !$version || !$marketplace || !$partnerTag) {
            return;
        }

        $config = new Configuration();
        $config->setCredentialId($credentialId);
        $config->setCredentialSecret($credentialSecret);
        $config->setVersion($version);

        self::$api = new DefaultApi(null, $config);
        self::$marketplace = $marketplace;
        self::$partnerTag  = $partnerTag;
    }

    private function skipIfNotConfigured(): void
    {
        $required = [
            'CREATORS_API_CREDENTIAL_ID',
            'CREATORS_API_CREDENTIAL_SECRET',
            'CREATORS_API_CREDENTIAL_VERSION',
            'CREATORS_API_MARKETPLACE',
            'CREATORS_API_PARTNER_TAG',
        ];
        foreach ($required as $var) {
            if (!getenv($var)) {
                $this->markTestSkipped(
                    "Integration env vars not set ($var missing). " .
                    'Copy phpunit.integration.xml.dist to phpunit.integration.xml and fill in credentials.'
                );
            }
        }
    }

    public function testGetItems(): void
    {
        $this->skipIfNotConfigured();

        $request = new GetItemsRequestContent();
        $request->setPartnerTag(self::$partnerTag);
        $request->setItemIds(['B0DLFMFBJW', 'B0BFC7WQ6R', 'B00ZV9RDKK']);
        $request->setResources([
            GetItemsResource::IMAGES_PRIMARY_MEDIUM,
            GetItemsResource::ITEM_INFO_TITLE,
            GetItemsResource::OFFERS_V2_LISTINGS_PRICE,
        ]);

        $response = self::$api->getItems(self::$marketplace, $request);

        $this->assertNotNull($response);
    }

    public function testSearchItems(): void
    {
        $this->skipIfNotConfigured();

        $request = new SearchItemsRequestContent();
        $request->setPartnerTag(self::$partnerTag);
        $request->setKeywords('Harry Potter');
        $request->setSearchIndex('Books');
        $request->setItemCount(2);
        $request->setResources([
            SearchItemsResource::ITEM_INFO_TITLE,
            SearchItemsResource::OFFERS_V2_LISTINGS_PRICE,
        ]);

        $response = self::$api->searchItems(self::$marketplace, $request);

        $this->assertNotNull($response);
    }

    public function testGetVariations(): void
    {
        $this->skipIfNotConfigured();

        $request = new GetVariationsRequestContent();
        $request->setPartnerTag(self::$partnerTag);
        $request->setAsin('B0DLFMFBJW');
        $request->setResources([
            GetVariationsResource::ITEM_INFO_TITLE,
            GetVariationsResource::OFFERS_V2_LISTINGS_PRICE,
        ]);

        $response = self::$api->getVariations(self::$marketplace, $request);

        $this->assertNotNull($response);
    }

    public function testGetBrowseNodes(): void
    {
        $this->skipIfNotConfigured();

        $request = new GetBrowseNodesRequestContent();
        $request->setPartnerTag(self::$partnerTag);
        $request->setBrowseNodeIds(['3040', '1', '3045']);
        $request->setResources([
            GetBrowseNodesResource::ANCESTOR,
            GetBrowseNodesResource::CHILDREN,
        ]);

        $response = self::$api->getBrowseNodes(self::$marketplace, $request);

        $this->assertNotNull($response);
    }

    public function testListFeeds(): void
    {
        $this->skipIfNotConfigured();

        try {
            $response = self::$api->listFeeds(self::$marketplace);
            $this->assertNotNull($response);
        } catch (ApiException $e) {
            if ($e->getCode() === 404) {
                $this->markTestSkipped('ListFeeds not available for this account (404 ResourceNotFoundException).');
            }
            throw $e;
        }
    }

    public function testListReports(): void
    {
        $this->skipIfNotConfigured();

        try {
            $response = self::$api->listReports(self::$marketplace);
            $this->assertNotNull($response);
        } catch (ApiException $e) {
            if ($e->getCode() === 404) {
                $this->markTestSkipped('ListReports not available for this account (404 ResourceNotFoundException).');
            }
            throw $e;
        }
    }

    public function testGetFeed(): void
    {
        $this->skipIfNotConfigured();

        try {
            $feedsResponse = self::$api->listFeeds(self::$marketplace);
        } catch (ApiException $e) {
            if ($e->getCode() === 404) {
                $this->markTestSkipped('ListFeeds not available for this account; skipping GetFeed test.');
            }
            throw $e;
        }

        $feeds = $feedsResponse->getFeeds();

        if (empty($feeds)) {
            $this->markTestSkipped('No feeds available for this account; skipping GetFeed test.');
        }

        $feedName = $feeds[0]->getFeedName();

        $request = new GetFeedRequestContent();
        $request->setFeedName($feedName);

        $response = self::$api->getFeed(self::$marketplace, $request);

        $this->assertNotNull($response);
    }

    public function testGetReport(): void
    {
        $this->skipIfNotConfigured();

        try {
            $reportsResponse = self::$api->listReports(self::$marketplace);
        } catch (ApiException $e) {
            if ($e->getCode() === 404) {
                $this->markTestSkipped('ListReports not available for this account; skipping GetReport test.');
            }
            throw $e;
        }

        $reports = $reportsResponse->getReports();

        if (empty($reports)) {
            $this->markTestSkipped('No reports available for this account; skipping GetReport test.');
        }

        $filename = $reports[0]->getFilename();

        $request = new GetReportRequestContent();
        $request->setFilename($filename);

        $response = self::$api->getReport(self::$marketplace, $request);

        $this->assertNotNull($response);
    }
}
