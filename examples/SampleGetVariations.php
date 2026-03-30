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
 * Sample script demonstrating how to use the CreatorsAPI PHP SDK for GetVariations API
 * GetVariations operation retrieves variations of a product (like different colors, sizes, etc.)
 * along with detailed information including images, item info, offers, and other product data.
 *
 * Run `composer install` before executing with `php SampleGetVariations.php`
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Amazon\CreatorsAPI\v1\ApiException;
use Amazon\CreatorsAPI\v1\com\amazon\creators\api\DefaultApi;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetVariationsRequestContent;
use Amazon\CreatorsAPI\v1\com\amazon\creators\model\GetVariationsResource;
use Amazon\CreatorsAPI\v1\Configuration;

function getVariations()
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
     * Choose resources you want from GetVariationsResource enum
     * For more details, refer: https://affiliate-program.amazon.com/creatorsapi/docs/en-us/api-reference/operations/get-variations#resources-parameter
     */
    $resources = [
        GetVariationsResource::IMAGES_PRIMARY_MEDIUM,
        GetVariationsResource::ITEM_INFO_TITLE,
        GetVariationsResource::OFFERS_V2_LISTINGS_AVAILABILITY,
        GetVariationsResource::OFFERS_V2_LISTINGS_CONDITION,
        GetVariationsResource::OFFERS_V2_LISTINGS_DEAL_DETAILS,
        GetVariationsResource::OFFERS_V2_LISTINGS_IS_BUY_BOX_WINNER,
        GetVariationsResource::OFFERS_V2_LISTINGS_LOYALTY_POINTS,
        GetVariationsResource::OFFERS_V2_LISTINGS_MERCHANT_INFO,
        GetVariationsResource::OFFERS_V2_LISTINGS_PRICE,
        GetVariationsResource::OFFERS_V2_LISTINGS_TYPE,
        GetVariationsResource::VARIATION_SUMMARY_VARIATION_DIMENSION
    ];
    
    // Create GetVariations request
    $getVariationsRequest = new GetVariationsRequestContent();
    $getVariationsRequest->setPartnerTag("<YOUR PARTNER TAG>");
    $getVariationsRequest->setAsin("B0DLFMFBJW");
    $getVariationsRequest->setResources($resources);
    
    try {
        // Call the GetVariations API
        $response = $api->getVariations($marketplace, $getVariationsRequest);
        
        echo "API called successfully." . PHP_EOL;
        echo "Complete Response:" . PHP_EOL . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
    } catch (ApiException $e) {
        echo "Error calling Creators API!" . PHP_EOL;
        echo $e . PHP_EOL;
    } catch (Exception $e) {
        echo "Unexpected error: " . $e . PHP_EOL;
    }
}

getVariations();
