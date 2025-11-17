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
 * DealDetails Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class DealDetails implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DealDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'accessType' => 'string',
        'badge' => 'string',
        'earlyAccessDurationInMilliseconds' => 'int',
        'endTime' => 'string',
        'percentClaimed' => 'int',
        'startTime' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'accessType' => null,
        'badge' => null,
        'earlyAccessDurationInMilliseconds' => 'int32',
        'endTime' => null,
        'percentClaimed' => 'int32',
        'startTime' => null
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
        'accessType' => 'AccessType',
        'badge' => 'Badge',
        'earlyAccessDurationInMilliseconds' => 'EarlyAccessDurationInMilliseconds',
        'endTime' => 'EndTime',
        'percentClaimed' => 'PercentClaimed',
        'startTime' => 'StartTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accessType' => 'setAccessType',
        'badge' => 'setBadge',
        'earlyAccessDurationInMilliseconds' => 'setEarlyAccessDurationInMilliseconds',
        'endTime' => 'setEndTime',
        'percentClaimed' => 'setPercentClaimed',
        'startTime' => 'setStartTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accessType' => 'getAccessType',
        'badge' => 'getBadge',
        'earlyAccessDurationInMilliseconds' => 'getEarlyAccessDurationInMilliseconds',
        'endTime' => 'getEndTime',
        'percentClaimed' => 'getPercentClaimed',
        'startTime' => 'getStartTime'
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
        $this->container['accessType'] = isset($data['accessType']) ? $data['accessType'] : null;
        $this->container['badge'] = isset($data['badge']) ? $data['badge'] : null;
        $this->container['earlyAccessDurationInMilliseconds'] = isset($data['earlyAccessDurationInMilliseconds']) ? $data['earlyAccessDurationInMilliseconds'] : null;
        $this->container['endTime'] = isset($data['endTime']) ? $data['endTime'] : null;
        $this->container['percentClaimed'] = isset($data['percentClaimed']) ? $data['percentClaimed'] : null;
        $this->container['startTime'] = isset($data['startTime']) ? $data['startTime'] : null;
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
     * Gets accessType
     *
     * @return string
     */
    public function getAccessType()
    {
        return $this->container['accessType'];
    }

    /**
     * Sets accessType
     *
     * @param string $accessType accessType
     *
     * @return $this
     */
    public function setAccessType($accessType)
    {
        $this->container['accessType'] = $accessType;

        return $this;
    }

    /**
     * Gets badge
     *
     * @return string
     */
    public function getBadge()
    {
        return $this->container['badge'];
    }

    /**
     * Sets badge
     *
     * @param string $badge badge
     *
     * @return $this
     */
    public function setBadge($badge)
    {
        $this->container['badge'] = $badge;

        return $this;
    }

    /**
     * Gets earlyAccessDurationInMilliseconds
     *
     * @return int
     */
    public function getEarlyAccessDurationInMilliseconds()
    {
        return $this->container['earlyAccessDurationInMilliseconds'];
    }

    /**
     * Sets earlyAccessDurationInMilliseconds
     *
     * @param int $earlyAccessDurationInMilliseconds earlyAccessDurationInMilliseconds
     *
     * @return $this
     */
    public function setEarlyAccessDurationInMilliseconds($earlyAccessDurationInMilliseconds)
    {
        $this->container['earlyAccessDurationInMilliseconds'] = $earlyAccessDurationInMilliseconds;

        return $this;
    }

    /**
     * Gets endTime
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->container['endTime'];
    }

    /**
     * Sets endTime
     *
     * @param string $endTime endTime
     *
     * @return $this
     */
    public function setEndTime($endTime)
    {
        $this->container['endTime'] = $endTime;

        return $this;
    }

    /**
     * Gets percentClaimed
     *
     * @return int
     */
    public function getPercentClaimed()
    {
        return $this->container['percentClaimed'];
    }

    /**
     * Sets percentClaimed
     *
     * @param int $percentClaimed percentClaimed
     *
     * @return $this
     */
    public function setPercentClaimed($percentClaimed)
    {
        $this->container['percentClaimed'] = $percentClaimed;

        return $this;
    }

    /**
     * Gets startTime
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->container['startTime'];
    }

    /**
     * Sets startTime
     *
     * @param string $startTime startTime
     *
     * @return $this
     */
    public function setStartTime($startTime)
    {
        $this->container['startTime'] = $startTime;

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


