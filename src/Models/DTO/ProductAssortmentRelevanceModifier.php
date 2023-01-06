<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductAssortmentRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductAssortmentRelevanceModifier, Relewise.Client";
    public array $assortments;
    public float $multiplyWeightBy;
    public static function create(float $multiplyWeightBy = 1) : ProductAssortmentRelevanceModifier
    {
        $result = new ProductAssortmentRelevanceModifier();
        $result->multiplyWeightBy = $multiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductAssortmentRelevanceModifier(), $arr);
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        return $result;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
