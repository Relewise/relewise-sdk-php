<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class floatProductDataValueFacet extends floatDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataValueFacet`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public DataSelectionStrategy $dataSelectionStrategy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleValueFacet, Relewise.Client")
        {
            return ProductDataDoubleValueFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatDataValueFacet::hydrateBase($result, $arr);
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
        return $result;
    }
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
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
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param ?float[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(float $selected)
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
