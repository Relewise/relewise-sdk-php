<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataStringValueFacetResult extends stringProductCategoryDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataStringValueFacetResult, Relewise.Client";
    public static function create() : ProductCategoryDataStringValueFacetResult
    {
        $result = new ProductCategoryDataStringValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataStringValueFacetResult
    {
        $result = stringProductCategoryDataValueFacetResult::hydrateBase(new ProductCategoryDataStringValueFacetResult(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(stringAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(stringAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
