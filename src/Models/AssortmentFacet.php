<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class AssortmentFacet extends intValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.AssortmentFacet, Relewise.Client";
    public AssortmentFilterType $assortmentFilterType;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentAssortmentFacet, Relewise.Client")
        {
            return ContentAssortmentFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductAssortmentFacet, Relewise.Client")
        {
            return ProductAssortmentFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryAssortmentFacet, Relewise.Client")
        {
            return ProductCategoryAssortmentFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = intValueFacet::hydrateBase($result, $arr);
        if (array_key_exists("assortmentFilterType", $arr))
        {
            $result->assortmentFilterType = AssortmentFilterType::from($arr["assortmentFilterType"]);
        }
        return $result;
    }
    /**
     * Sets assortmentFilterType to a new value.
     * @param AssortmentFilterType $assortmentFilterType new value.
     */
    function setAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param ?int[] $selected new value.
     */
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
    /**
     * Adds a new element to selected.
     * @param int $selected new element.
     */
    function addToSelected(int $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ?FacetSettings $settings new value.
     */
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
