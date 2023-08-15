<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantIdFilter, Relewise.Client";
    public array $variantIds;
    public static function create(bool $negated = false) : VariantIdFilter
    {
        $result = new VariantIdFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantIdFilter
    {
        $result = Filter::hydrateBase(new VariantIdFilter(), $arr);
        if (array_key_exists("variantIds", $arr))
        {
            $result->variantIds = array();
            foreach($arr["variantIds"] as &$value)
            {
                array_push($result->variantIds, $value);
            }
        }
        return $result;
    }
    /**
     * Sets variantIds to a new value.
     * @param string[] $variantIds new value.
     */
    function setVariantIds(string ... $variantIds)
    {
        $this->variantIds = $variantIds;
        return $this;
    }
    /**
     * Sets variantIds to a new value from an array.
     * @param string[] $variantIds new value.
     */
    function setVariantIdsFromArray(array $variantIds)
    {
        $this->variantIds = $variantIds;
        return $this;
    }
    /**
     * Adds a new element to variantIds.
     * @param string $variantIds new element.
     */
    function addToVariantIds(string $variantIds)
    {
        if (!isset($this->variantIds))
        {
            $this->variantIds = array();
        }
        array_push($this->variantIds, $variantIds);
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
