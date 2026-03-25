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

/**
 * Sample script demonstrating how to use the CreatorsAPI PHP SDK for SearchItems API
 * SearchItems operation searches for products on Amazon based on keywords and returns
 * detailed information including images, item info, offers, and other product data.
 *
 * Run `composer install` before executing with `php SampleSearchItems.php`
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Amazon\CreatorsAPI\v1\Configuration;
use Amazon\CreatorsAPI\v1\com\amazon\creators\api\DefaultApi;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\SearchItemsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\SearchItemsResource;
use Amazon\CreatorsAPI\v1\ApiException;

function searchItems()
{
    // Initialize configuration with credential details
    $config = new Configuration();
    $config->setCredentialId("<YOUR CREDENTIAL ID>");
    $config->setCredentialSecret("<YOUR CREDENTIAL SECRET>");
    $config->setVersion("<YOUR CREDENTIAL VERSION>");
    
    // Initialize API
    $api = new DefaultApi(null, $config);
    
    /**
     * Add marketplace. For more details, refer: https://affiliate-program.amazon.com/creatorsapi/docs/en-us/api-reference/common-request-headers-and-parameters#marketplace-locale-reference
     */
    $marketplace = "<YOUR MARKETPLACE>";
    
    /**
     * Choose resources you want from SearchItemsResource enum
     * For more details, refer: https://affiliate-program.amazon.com/creatorsapi/docs/en-us/api-reference/operations/search-items#resources-parameter
     */
    $resources = [
        SearchItemsResource::IMAGES_PRIMARY_MEDIUM,
        SearchItemsResource::ITEM_INFO_TITLE,
        SearchItemsResource::OFFERS_V2_LISTINGS_AVAILABILITY,
        SearchItemsResource::OFFERS_V2_LISTINGS_CONDITION,
        SearchItemsResource::OFFERS_V2_LISTINGS_DEAL_DETAILS,
        SearchItemsResource::OFFERS_V2_LISTINGS_IS_BUY_BOX_WINNER,
        SearchItemsResource::OFFERS_V2_LISTINGS_LOYALTY_POINTS,
        SearchItemsResource::OFFERS_V2_LISTINGS_MERCHANT_INFO,
        SearchItemsResource::OFFERS_V2_LISTINGS_PRICE,
        SearchItemsResource::OFFERS_V2_LISTINGS_TYPE
    ];
    
    // Create SearchItems request
    $searchItemsRequest = new SearchItemsRequestContent();
    $searchItemsRequest->setPartnerTag("<YOUR PARTNER TAG>");
    $searchItemsRequest->setKeywords("Harry Potter");
    $searchItemsRequest->setSearchIndex("Books");
    $searchItemsRequest->setItemCount(2);
    $searchItemsRequest->setResources($resources);
    
    try {
        // Call the SearchItems API
        $response = $api->searchItems($marketplace, $searchItemsRequest);
        
        echo "API called successfully." . PHP_EOL;
        echo "Complete Response:" . PHP_EOL . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
    } catch (ApiException $e) {
        echo "Error calling Creators API!" . PHP_EOL;
        echo $e . PHP_EOL;
    } catch (Exception $e) {
        echo "Unexpected error: " . $e . PHP_EOL;
    }
}

searchItems();
