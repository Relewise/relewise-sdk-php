<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier, Relewise.Client";
    public array $productIds;
    public float $multiplyWeightBy;
    public bool $negated;
    public static function create(float $multiplyWeightBy = 1, bool $negated = false) : ProductIdRelevanceModifier
    {
        $result = new ProductIdRelevanceModifier();
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductIdRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductIdRelevanceModifier(), $arr);
        if (array_key_exists("productIds", $arr))
        {
            $result->productIds = array();
            foreach($arr["productIds"] as &$value)
            {
                array_push($result->productIds, $value);
            }
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    function withProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    function withMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
