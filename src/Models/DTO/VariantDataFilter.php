<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
        $result->mustMatchAllConditions = true;
        $result->filterOutIfKeyIsNotFound = true;
        return $result;
    }
    public static function hydrate(array $arr) : VariantDataFilter
    {
        $result = DataFilter::hydrateBase(new VariantDataFilter(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setFilterOutIfKeyIsNotFound(bool $filterOutIfKeyIsNotFound)
    {
        $this->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $this;
    }
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    function setConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    function addToObjectPath(string $objectPath)
    {
        if (!isset($this->objectPath))
        {
            $this->objectPath = array();
        }
        array_push($this->objectPath, $objectPath);
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
