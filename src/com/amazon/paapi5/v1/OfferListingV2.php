<?php

/**
 * Copyright 2024 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1;

use \ArrayAccess;
use \Amazon\ProductAdvertisingAPI\v1\ObjectSerializer;

/**
 * OfferListingV2 Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class OfferListingV2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OfferListingV2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'availability' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferAvailabilityV2',
        'condition' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferConditionV2',
        'dealDetails' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\DealDetails',
        'isBuyBoxWinner' => 'bool',
        'loyaltyPoints' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferLoyaltyPointsV2',
        'merchantInfo' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferMerchantInfoV2',
        'price' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPriceV2',
        'type' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferType',
        'violatesMAP' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'availability' => null,
        'condition' => null,
        'dealDetails' => null,
        'isBuyBoxWinner' => null,
        'loyaltyPoints' => null,
        'merchantInfo' => null,
        'price' => null,
        'type' => null,
        'violatesMAP' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'availability' => 'Availability',
        'condition' => 'Condition',
        'dealDetails' => 'DealDetails',
        'isBuyBoxWinner' => 'IsBuyBoxWinner',
        'loyaltyPoints' => 'LoyaltyPoints',
        'merchantInfo' => 'MerchantInfo',
        'price' => 'Price',
        'type' => 'Type',
        'violatesMAP' => 'ViolatesMAP'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'availability' => 'setAvailability',
        'condition' => 'setCondition',
        'dealDetails' => 'setDealDetails',
        'isBuyBoxWinner' => 'setIsBuyBoxWinner',
        'loyaltyPoints' => 'setLoyaltyPoints',
        'merchantInfo' => 'setMerchantInfo',
        'price' => 'setPrice',
        'type' => 'setType',
        'violatesMAP' => 'setViolatesMAP'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'availability' => 'getAvailability',
        'condition' => 'getCondition',
        'dealDetails' => 'getDealDetails',
        'isBuyBoxWinner' => 'getIsBuyBoxWinner',
        'loyaltyPoints' => 'getLoyaltyPoints',
        'merchantInfo' => 'getMerchantInfo',
        'price' => 'getPrice',
        'type' => 'getType',
        'violatesMAP' => 'getViolatesMAP'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['availability'] = isset($data['availability']) ? $data['availability'] : null;
        $this->container['condition'] = isset($data['condition']) ? $data['condition'] : null;
        $this->container['dealDetails'] = isset($data['dealDetails']) ? $data['dealDetails'] : null;
        $this->container['isBuyBoxWinner'] = isset($data['isBuyBoxWinner']) ? $data['isBuyBoxWinner'] : null;
        $this->container['loyaltyPoints'] = isset($data['loyaltyPoints']) ? $data['loyaltyPoints'] : null;
        $this->container['merchantInfo'] = isset($data['merchantInfo']) ? $data['merchantInfo'] : null;
        $this->container['price'] = isset($data['price']) ? $data['price'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['violatesMAP'] = isset($data['violatesMAP']) ? $data['violatesMAP'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets availability
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferAvailabilityV2
     */
    public function getAvailability()
    {
        return $this->container['availability'];
    }

    /**
     * Sets availability
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferAvailabilityV2 $availability availability
     *
     * @return $this
     */
    public function setAvailability($availability)
    {
        $this->container['availability'] = $availability;

        return $this;
    }

    /**
     * Gets condition
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferConditionV2
     */
    public function getCondition()
    {
        return $this->container['condition'];
    }

    /**
     * Sets condition
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferConditionV2 $condition condition
     *
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->container['condition'] = $condition;

        return $this;
    }

    /**
     * Gets dealDetails
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\DealDetails
     */
    public function getDealDetails()
    {
        return $this->container['dealDetails'];
    }

    /**
     * Sets dealDetails
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\DealDetails $dealDetails dealDetails
     *
     * @return $this
     */
    public function setDealDetails($dealDetails)
    {
        $this->container['dealDetails'] = $dealDetails;

        return $this;
    }

    /**
     * Gets isBuyBoxWinner
     *
     * @return bool
     */
    public function getIsBuyBoxWinner()
    {
        return $this->container['isBuyBoxWinner'];
    }

    /**
     * Sets isBuyBoxWinner
     *
     * @param bool $isBuyBoxWinner isBuyBoxWinner
     *
     * @return $this
     */
    public function setIsBuyBoxWinner($isBuyBoxWinner)
    {
        $this->container['isBuyBoxWinner'] = $isBuyBoxWinner;

        return $this;
    }

    /**
     * Gets loyaltyPoints
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferLoyaltyPointsV2
     */
    public function getLoyaltyPoints()
    {
        return $this->container['loyaltyPoints'];
    }

    /**
     * Sets loyaltyPoints
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferLoyaltyPointsV2 $loyaltyPoints loyaltyPoints
     *
     * @return $this
     */
    public function setLoyaltyPoints($loyaltyPoints)
    {
        $this->container['loyaltyPoints'] = $loyaltyPoints;

        return $this;
    }

    /**
     * Gets merchantInfo
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferMerchantInfoV2
     */
    public function getMerchantInfo()
    {
        return $this->container['merchantInfo'];
    }

    /**
     * Sets merchantInfo
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferMerchantInfoV2 $merchantInfo merchantInfo
     *
     * @return $this
     */
    public function setMerchantInfo($merchantInfo)
    {
        $this->container['merchantInfo'] = $merchantInfo;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPriceV2
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPriceV2 $price price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferType
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferType $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets violatesMAP
     *
     * @return bool
     */
    public function getViolatesMAP()
    {
        return $this->container['violatesMAP'];
    }

    /**
     * Sets violatesMAP
     *
     * @param bool $violatesMAP violatesMAP
     *
     * @return $this
     */
    public function setViolatesMAP($violatesMAP)
    {
        $this->container['violatesMAP'] = $violatesMAP;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


