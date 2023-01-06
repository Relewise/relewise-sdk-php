<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductAssortmentFacet extends AssortmentFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductAssortmentFacet, Relewise.Client";
    public AssortmentSelectionStrategy $assortmentSelectionStrategy;
    public static function create(AssortmentSelectionStrategy $assortmentSelectionStrategy, AssortmentFilterType $assortmentFilterType, int ... $selected) : ProductAssortmentFacet
    {
        $result = new ProductAssortmentFacet();
        $result->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        $result->assortmentFilterType = $assortmentFilterType;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentFacet
    {
        $result = AssortmentFacet::hydrateBase(new ProductAssortmentFacet(), $arr);
        if (array_key_exists("assortmentSelectionStrategy", $arr))
        {
            $result->assortmentSelectionStrategy = AssortmentSelectionStrategy::from($arr["assortmentSelectionStrategy"]);
        }
        return $result;
    }
    function setAssortmentSelectionStrategy(AssortmentSelectionStrategy $assortmentSelectionStrategy)
    {
        $this->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        return $this;
    }
    function setAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(int $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
