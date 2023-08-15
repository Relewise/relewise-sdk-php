<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class DataFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataFilter, Relewise.Client";
    public string $key;
    public bool $filterOutIfKeyIsNotFound;
    public bool $mustMatchAllConditions;
    public ?ValueConditionCollection $conditions;
    public ?Language $language;
    public ?Currency $currency;
    public ?array $objectPath;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.BrandDataFilter, Relewise.Client")
        {
            return BrandDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryDataFilter, Relewise.Client")
        {
            return ContentCategoryDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentDataFilter, Relewise.Client")
        {
            return ContentDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryDataFilter, Relewise.Client")
        {
            return ProductCategoryDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductDataFilter, Relewise.Client")
        {
            return ProductDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantDataFilter, Relewise.Client")
        {
            return VariantDataFilter::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Filter::hydrateBase($result, $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("filterOutIfKeyIsNotFound", $arr))
        {
            $result->filterOutIfKeyIsNotFound = $arr["filterOutIfKeyIsNotFound"];
        }
        if (array_key_exists("mustMatchAllConditions", $arr))
        {
            $result->mustMatchAllConditions = $arr["mustMatchAllConditions"];
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ValueConditionCollection::hydrate($arr["conditions"]);
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("objectPath", $arr))
        {
            $result->objectPath = array();
            foreach($arr["objectPath"] as &$value)
            {
                array_push($result->objectPath, $value);
            }
        }
        return $result;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets filterOutIfKeyIsNotFound to a new value.
     * @param bool $filterOutIfKeyIsNotFound new value.
     */
    function setFilterOutIfKeyIsNotFound(bool $filterOutIfKeyIsNotFound)
    {
        $this->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $this;
    }
    /**
     * Sets mustMatchAllConditions to a new value.
     * @param bool $mustMatchAllConditions new value.
     */
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    /**
     * Sets conditions to a new value.
     * @param ?ValueConditionCollection $conditions new value.
     */
    function setConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Sets objectPath to a new value.
     * @param ?string[] $objectPath new value.
     */
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    /**
     * Sets objectPath to a new value from an array.
     * @param ?string[] $objectPath new value.
     */
    function setObjectPathFromArray(array $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    /**
     * Adds a new element to objectPath.
     * @param string $objectPath new element.
     */
    function addToObjectPath(string $objectPath)
    {
        if (!isset($this->objectPath))
        {
            $this->objectPath = array();
        }
        array_push($this->objectPath, $objectPath);
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
