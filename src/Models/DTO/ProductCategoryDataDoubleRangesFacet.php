<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataDoubleRangesFacet extends floatProductCategoryDataRangesFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangesFacet, Relewise.Client";
    public static function create() : ProductCategoryDataDoubleRangesFacet
    {
        $result = new ProductCategoryDataDoubleRangesFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleRangesFacet
    {
        $result = floatProductCategoryDataRangesFacet::hydrateBase(new ProductCategoryDataDoubleRangesFacet(), $arr);
        return $result;
    }
    function setPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    function setExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    function setSelected(?floatChainableRange ... $selected)
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
