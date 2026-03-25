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

namespace Amazon\CreatorsAPI\v1\Test\Api;

use Amazon\CreatorsAPI\v1\Configuration;
use Amazon\CreatorsAPI\v1\com\amazon\creators\api\DefaultApi;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetBrowseNodesRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetFeedRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetItemsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetReportRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetVariationsRequestContent;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class DefaultApiTest extends TestCase
{
    const ANY_MARKETPLACE = 'www.amazon.com';

    // --- getBrowseNodes ---

    public function testGetBrowseNodes_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getBrowseNodes(self::ANY_MARKETPLACE, new GetBrowseNodesRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetBrowseNodesWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getBrowseNodesWithHttpInfo(self::ANY_MARKETPLACE, new GetBrowseNodesRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetBrowseNodesAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getBrowseNodesAsync(self::ANY_MARKETPLACE, new GetBrowseNodesRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetBrowseNodesAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getBrowseNodesAsyncWithHttpInfo(self::ANY_MARKETPLACE, new GetBrowseNodesRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- getFeed ---

    public function testGetFeed_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getFeed(self::ANY_MARKETPLACE, new GetFeedRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetFeedWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getFeedWithHttpInfo(self::ANY_MARKETPLACE, new GetFeedRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetFeedAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getFeedAsync(self::ANY_MARKETPLACE, new GetFeedRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetFeedAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getFeedAsyncWithHttpInfo(self::ANY_MARKETPLACE, new GetFeedRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- getItems ---

    public function testGetItems_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getItems(self::ANY_MARKETPLACE, new GetItemsRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetItemsWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getItemsWithHttpInfo(self::ANY_MARKETPLACE, new GetItemsRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetItemsAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getItemsAsync(self::ANY_MARKETPLACE, new GetItemsRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetItemsAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getItemsAsyncWithHttpInfo(self::ANY_MARKETPLACE, new GetItemsRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- getReport ---

    public function testGetReport_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getReport(self::ANY_MARKETPLACE, new GetReportRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetReportWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getReportWithHttpInfo(self::ANY_MARKETPLACE, new GetReportRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetReportAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getReportAsync(self::ANY_MARKETPLACE, new GetReportRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetReportAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getReportAsyncWithHttpInfo(self::ANY_MARKETPLACE, new GetReportRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- getVariations ---

    public function testGetVariations_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getVariations(self::ANY_MARKETPLACE, new GetVariationsRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetVariationsWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->getVariationsWithHttpInfo(self::ANY_MARKETPLACE, new GetVariationsRequestContent());
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetVariationsAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getVariationsAsync(self::ANY_MARKETPLACE, new GetVariationsRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testGetVariationsAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->getVariationsAsyncWithHttpInfo(self::ANY_MARKETPLACE, new GetVariationsRequestContent());
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- searchItems ---

    public function testSearchItems_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->searchItems(self::ANY_MARKETPLACE, null);
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testSearchItemsWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->searchItemsWithHttpInfo(self::ANY_MARKETPLACE, null);
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testSearchItemsAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->searchItemsAsync(self::ANY_MARKETPLACE, null);
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testSearchItemsAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->searchItemsAsyncWithHttpInfo(self::ANY_MARKETPLACE, null);
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- listFeeds ---

    public function testListFeeds_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->listFeeds(self::ANY_MARKETPLACE);
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testListFeedsWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->listFeedsWithHttpInfo(self::ANY_MARKETPLACE);
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testListFeedsAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->listFeedsAsync(self::ANY_MARKETPLACE);
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testListFeedsAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->listFeedsAsyncWithHttpInfo(self::ANY_MARKETPLACE);
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    // --- listReports ---

    public function testListReports_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->listReports(self::ANY_MARKETPLACE);
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testListReportsWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $apiInstance->listReportsWithHttpInfo(self::ANY_MARKETPLACE);
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testListReportsAsync_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->listReportsAsync(self::ANY_MARKETPLACE);
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }

    public function testListReportsAsyncWithHttpInfo_MissingCredentials(): void
    {
        $config = new Configuration();
        $apiInstance = new DefaultApi(new Client(), $config);
        try {
            $promise = $apiInstance->listReportsAsyncWithHttpInfo(self::ANY_MARKETPLACE);
            $promise->wait();
        } catch (\InvalidArgumentException $exception) {
            $this->assertStringContainsString('Missing OAuth2 configuration', $exception->getMessage());
            return;
        }
        $this->fail('Expected InvalidArgumentException was not thrown');
    }
}
