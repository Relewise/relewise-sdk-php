<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class AssortmentFacet extends intValueFacet
{
    public string $typeDefinition = "";
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
    /** @param ?int[] $selected new value. */
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
