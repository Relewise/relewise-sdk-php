<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentDataFilter extends DataFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentDataFilter, Relewise.Client";
    public static function create(string $key, bool $filterOutIfKeyIsNotFound = true, ?Language $language = Null, ?Currency $currency = Null) : ContentDataFilter
    {
        $result = new ContentDataFilter();
        $result->key = $key;
        $result->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        $result->language = $language;
        $result->currency = $currency;
        $result->mustMatchAllConditions = true;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataFilter
    {
        $result = DataFilter::hydrateBase(new ContentDataFilter(), $arr);
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
    function setObjectPathFromArray(array $objectPath)
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
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
