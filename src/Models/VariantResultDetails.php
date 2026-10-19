<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class VariantResultDetails implements JsonSerializable
{
    public string $variantId;
    public Multilingual $displayName;
    public array $specification;
    public array $assortments;
    public array $data;
    public MultiCurrency $listPrice;
    public MultiCurrency $salesPrice;
    public bool $disabled;
    /** Contains engagement signals (sentiment and favorite state) recorded for the current user on this variant. Populated only when the request sets UserEngagement to true. */
    public ?ProductEngagementData $userEngagement;
    /** Total number of orders containing this variant, regardless of the quantity purchased in each order. */
    public int $containedInTotalNumberOfOrders;
    /** Total number of recorded views of this variant, including repeated views by the same user. */
    public int $viewedTotalNumberOfTimes;
    /** UTC timestamp when this variant was created in the dataset, with millisecond precision. */
    public DateTime $createdUtc;
    /** Recorded UTC timestamp of the last purchase of this variant, with minute precision. Null when no purchase timestamp is recorded. */
    public ?DateTime $lastPurchasedUtc;
    /** UTC timestamp of the most recent view of this variant, with minute precision. Null when no view timestamp is recorded. */
    public ?DateTime $lastViewedUtc;
    
    public static function create(string $variantId) : VariantResultDetails
    {
        $result = new VariantResultDetails();
        $result->variantId = $variantId;
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantResultDetails
    {
        $result = new VariantResultDetails();
        if (array_key_exists("variantId", $arr))
        {
            $result->variantId = $arr["variantId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("specification", $arr))
        {
            $result->specification = array();
            foreach($arr["specification"] as $key => $value)
            {
                $result->specification[$key] = $value;
            }
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("listPrice", $arr))
        {
            $result->listPrice = MultiCurrency::hydrate($arr["listPrice"]);
        }
        if (array_key_exists("salesPrice", $arr))
        {
            $result->salesPrice = MultiCurrency::hydrate($arr["salesPrice"]);
        }
        if (array_key_exists("disabled", $arr))
        {
            $result->disabled = $arr["disabled"];
        }
        if (array_key_exists("userEngagement", $arr))
        {
            $result->userEngagement = ProductEngagementData::hydrate($arr["userEngagement"]);
        }
        if (array_key_exists("containedInTotalNumberOfOrders", $arr))
        {
            $result->containedInTotalNumberOfOrders = $arr["containedInTotalNumberOfOrders"];
        }
        if (array_key_exists("viewedTotalNumberOfTimes", $arr))
        {
            $result->viewedTotalNumberOfTimes = $arr["viewedTotalNumberOfTimes"];
        }
        if (array_key_exists("createdUtc", $arr))
        {
            $result->createdUtc = new DateTime($arr["createdUtc"]);
        }
        if (array_key_exists("lastPurchasedUtc", $arr))
        {
            $result->lastPurchasedUtc = new DateTime($arr["lastPurchasedUtc"]);
        }
        if (array_key_exists("lastViewedUtc", $arr))
        {
            $result->lastViewedUtc = new DateTime($arr["lastViewedUtc"]);
        }
        return $result;
    }
    
    function setVariantId(string $variantId)
    {
        $this->variantId = $variantId;
        return $this;
    }
    
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function addToSpecification(string $key, string $value)
    {
        if (!isset($this->specification))
        {
            $this->specification = array();
        }
        $this->specification[$key] = $value;
        return $this;
    }
    
    /** @param array<string, string> $specification associative array. */
    function setSpecificationFromAssociativeArray(array $specification)
    {
        $this->specification = $specification;
        return $this;
    }
    
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    /** @param int[] $assortments new value. */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    
    /** @param array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    
    function setListPrice(MultiCurrency $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    
    function setSalesPrice(MultiCurrency $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
    
    function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
    
    /** Contains engagement signals (sentiment and favorite state) recorded for the current user on this variant. Populated only when the request sets UserEngagement to true. */
    function setUserEngagement(?ProductEngagementData $userEngagement)
    {
        $this->userEngagement = $userEngagement;
        return $this;
    }
    
    /** Total number of orders containing this variant, regardless of the quantity purchased in each order. */
    function setContainedInTotalNumberOfOrders(int $containedInTotalNumberOfOrders)
    {
        $this->containedInTotalNumberOfOrders = $containedInTotalNumberOfOrders;
        return $this;
    }
    
    /** Total number of recorded views of this variant, including repeated views by the same user. */
    function setViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    
    /** UTC timestamp when this variant was created in the dataset, with millisecond precision. */
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    
    /** Recorded UTC timestamp of the last purchase of this variant, with minute precision. Null when no purchase timestamp is recorded. */
    function setLastPurchasedUtc(?DateTime $lastPurchasedUtc)
    {
        $this->lastPurchasedUtc = $lastPurchasedUtc;
        return $this;
    }
    
    /** UTC timestamp of the most recent view of this variant, with minute precision. Null when no view timestamp is recorded. */
    function setLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->variantId))
        {
            $result["variantId"] = $this->variantId;
        }
        if (isset($this->displayName))
        {
            $result["displayName"] = $this->displayName;
        }
        if (isset($this->specification))
        {
            $result["specification"] = $this->specification;
        }
        if (isset($this->assortments))
        {
            $result["assortments"] = $this->assortments;
        }
        if (isset($this->data))
        {
            $result["data"] = $this->data;
        }
        if (isset($this->listPrice))
        {
            $result["listPrice"] = $this->listPrice;
        }
        if (isset($this->salesPrice))
        {
            $result["salesPrice"] = $this->salesPrice;
        }
        if (isset($this->disabled))
        {
            $result["disabled"] = $this->disabled;
        }
        if (isset($this->userEngagement))
        {
            $result["userEngagement"] = $this->userEngagement;
        }
        if (isset($this->containedInTotalNumberOfOrders))
        {
            $result["containedInTotalNumberOfOrders"] = $this->containedInTotalNumberOfOrders;
        }
        if (isset($this->viewedTotalNumberOfTimes))
        {
            $result["viewedTotalNumberOfTimes"] = $this->viewedTotalNumberOfTimes;
        }
        if (isset($this->createdUtc))
        {
            $result["createdUtc"] = $this->createdUtc->format('Y-m-d\TH:i:s.vP');
        }
        if (isset($this->lastPurchasedUtc))
        {
            $result["lastPurchasedUtc"] = $this->lastPurchasedUtc->format(DATE_ATOM);
        }
        if (isset($this->lastViewedUtc))
        {
            $result["lastViewedUtc"] = $this->lastViewedUtc->format(DATE_ATOM);
        }
        return $result;
    }
}
