<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class floatProductCategoryDataRangeFacet extends floatDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataRangeFacet`1[[System.Nullable`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangeFacet, Relewise.Client")
        {
            return ProductCategoryDataDoubleRangeFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatDataRangeFacet::hydrateBase($result, $arr);
        return $result;
    }
    function withSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withKey(string $key)
    {
        $this->key = $key;
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