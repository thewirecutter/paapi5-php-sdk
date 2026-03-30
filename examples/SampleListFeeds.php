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
 * Sample script demonstrating how to use the CreatorsAPI PHP SDK for ListFeeds API
 * ListFeeds operation retrieves a list of available product feeds that your store has access to.
 *
 * Run `composer install` before executing with `php SampleListFeeds.php`
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Amazon\CreatorsAPI\v1\ApiException;
use Amazon\CreatorsAPI\v1\com\amazon\creators\api\DefaultApi;
use Amazon\CreatorsAPI\v1\Configuration;

function listFeeds()
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
    
    try {
        // Call the ListFeeds API
        $response = $api->listFeeds($marketplace);
        
        echo "API called successfully." . PHP_EOL;
        echo "Complete Response:" . PHP_EOL . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
    } catch (ApiException $e) {
        echo "Error calling Creators API!" . PHP_EOL;
        echo $e . PHP_EOL;
    } catch (Exception $e) {
        echo "Unexpected error: " . $e . PHP_EOL;
    }
}

listFeeds();
