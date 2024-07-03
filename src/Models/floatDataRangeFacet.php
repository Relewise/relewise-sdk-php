<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatDataRangeFacet extends Facet
{
    public string $typeDefinition = "";
    public ?floatRange $selected;
    public string $key;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangeFacet, Relewise.Client")
        {
            return ContentDataDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleRangeFacet, Relewise.Client")
        {
            return DataObjectDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangeFacet, Relewise.Client")
        {
            return ProductCategoryDataDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangeFacet, Relewise.Client")
        {
            return ProductDataDoubleRangeFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Facet::hydrateBase($result, $arr);
        if (array_key_exists("selected", $arr))
        {
            $result->selected = floatRange::hydrate($arr["selected"]);
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setKey(string $key)
    {
        $this->key = $key;
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
