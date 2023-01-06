<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
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
