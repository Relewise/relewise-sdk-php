<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class stringDataValueFacet extends stringValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataValueFacet`1[[System.String, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public string $key;
    public ?CollectionFilterType $collectionFilterType;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataStringValueFacet, Relewise.Client")
        {
            return ContentDataStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectStringValueFacet, Relewise.Client")
        {
            return DataObjectStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataStringValueFacet, Relewise.Client")
        {
            return ProductCategoryDataStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataStringValueFacet, Relewise.Client")
        {
            return ProductDataStringValueFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = stringValueFacet::hydrateBase($result, $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("collectionFilterType", $arr))
        {
            $result->collectionFilterType = $arr["collectionFilterType"];
        }
        return $result;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    function withSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function withSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}