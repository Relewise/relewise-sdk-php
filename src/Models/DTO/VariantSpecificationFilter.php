<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantSpecificationFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantSpecificationFilter, Relewise.Client";
    public string $key;
    public bool $filterOutIfKeyIsNotFound;
    public string $equalTo;
    public static function create(string $key, bool $filterOutIfKeyIsNotFound = true) : VariantSpecificationFilter
    {
        $result = new VariantSpecificationFilter();
        $result->key = $key;
        $result->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $result;
    }
    public static function hydrate(array $arr) : VariantSpecificationFilter
    {
        $result = Filter::hydrateBase(new VariantSpecificationFilter(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("filterOutIfKeyIsNotFound", $arr))
        {
            $result->filterOutIfKeyIsNotFound = $arr["filterOutIfKeyIsNotFound"];
        }
        if (array_key_exists("equalTo", $arr))
        {
            $result->equalTo = $arr["equalTo"];
        }
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
    function withEqualTo(string $equalTo)
    {
        $this->equalTo = $equalTo;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}