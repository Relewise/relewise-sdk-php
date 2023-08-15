<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductIdFilter, Relewise.Client";
    public array $productIds;
    public static function create(bool $negated = false) : ProductIdFilter
    {
        $result = new ProductIdFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductIdFilter
    {
        $result = Filter::hydrateBase(new ProductIdFilter(), $arr);
        if (array_key_exists("productIds", $arr))
        {
            $result->productIds = array();
            foreach($arr["productIds"] as &$value)
            {
                array_push($result->productIds, $value);
            }
        }
        return $result;
    }
    /**
     * Sets productIds to a new value.
     * @param string[] $productIds new value.
     */
    function setProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    /**
     * Sets productIds to a new value from an array.
     * @param string[] $productIds new value.
     */
    function setProductIdsFromArray(array $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    /**
     * Adds a new element to productIds.
     * @param string $productIds new element.
     */
    function addToProductIds(string $productIds)
    {
        if (!isset($this->productIds))
        {
            $this->productIds = array();
        }
        array_push($this->productIds, $productIds);
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
