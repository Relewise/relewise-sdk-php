<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryAssortmentFacet extends AssortmentFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryAssortmentFacet, Relewise.Client";
    public static function create(AssortmentFilterType $assortmentFilterType, int ... $selected) : ProductCategoryAssortmentFacet
    {
        $result = new ProductCategoryAssortmentFacet();
        $result->assortmentFilterType = $assortmentFilterType;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryAssortmentFacet
    {
        $result = AssortmentFacet::hydrateBase(new ProductCategoryAssortmentFacet(), $arr);
        return $result;
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
    /**
     * Sets selected to a new value from an array.
     * @param ?int[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
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
