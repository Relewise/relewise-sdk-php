<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandDataFilter extends DataFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.BrandDataFilter, Relewise.Client";
    public static function create() : BrandDataFilter
    {
        $result = new BrandDataFilter();
        $result->filterOutIfKeyIsNotFound = true;
        $result->mustMatchAllConditions = true;
        return $result;
    }
    public static function hydrate(array $arr) : BrandDataFilter
    {
        $result = DataFilter::hydrateBase(new BrandDataFilter(), $arr);
        return $result;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withFilterOutIfKeyIsNotFound(bool $filterOutIfKeyIsNotFound)
    {
        $this->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $this;
    }
    function withMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    function withConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function withLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
