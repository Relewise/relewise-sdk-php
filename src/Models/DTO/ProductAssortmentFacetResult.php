<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductAssortmentFacetResult extends AssortmentFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductAssortmentFacetResult, Relewise.Client";
    public AssortmentSelectionStrategy $assortmentSelectionStrategy;
    public static function create(AssortmentSelectionStrategy $assortmentSelectionStrategy, AssortmentFilterType $assortmentFilterType, array $selected, intAvailableFacetValue ... $available) : ProductAssortmentFacetResult
    {
        $result = new ProductAssortmentFacetResult();
        $result->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        $result->assortmentFilterType = $assortmentFilterType;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentFacetResult
    {
        $result = AssortmentFacetResult::hydrateBase(new ProductAssortmentFacetResult(), $arr);
        if (array_key_exists("assortmentSelectionStrategy", $arr))
        {
            $result->assortmentSelectionStrategy = AssortmentSelectionStrategy::from($arr["assortmentSelectionStrategy"]);
        }
        return $result;
    }
    function withAssortmentSelectionStrategy(AssortmentSelectionStrategy $assortmentSelectionStrategy)
    {
        $this->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        return $this;
    }
    function withAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    function withSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(intAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
