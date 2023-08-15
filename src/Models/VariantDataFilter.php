<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantDataFilter extends DataFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantDataFilter, Relewise.Client";
    public static function create(string $key, bool $mustMatchAllConditions = true, bool $filterOutIfKeyIsNotFound = true, ?Language $language = Null, ?Currency $currency = Null) : VariantDataFilter
    {
        $result = new VariantDataFilter();
        $result->key = $key;
        $result->mustMatchAllConditions = $mustMatchAllConditions;
        $result->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        $result->language = $language;
        $result->currency = $currency;
        return $result;
    }
    public static function hydrate(array $arr) : VariantDataFilter
    {
        $result = DataFilter::hydrateBase(new VariantDataFilter(), $arr);
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
