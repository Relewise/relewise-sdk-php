<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantSpecificationFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantSpecificationFilter, Relewise.Client";
    public string $key;
    public bool $filterOutIfKeyIsNotFound;
    public string $equalTo;
    public static function create(string $key, string $equalToValue, bool $filterOutIfKeyIsNotFound = true) : VariantSpecificationFilter
    {
        $result = new VariantSpecificationFilter();
        $result->key = $key;
        $result->equalTo = $equalToValue;
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
     * Sets equalTo to a new value.
     * @param string $equalTo new value.
     */
    function setEqualTo(string $equalTo)
    {
        $this->equalTo = $equalTo;
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
