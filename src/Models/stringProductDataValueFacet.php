<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class stringProductDataValueFacet extends stringDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataValueFacet`1[[System.String, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public DataSelectionStrategy $dataSelectionStrategy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataStringValueFacet, Relewise.Client")
        {
            return ProductDataStringValueFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = stringDataValueFacet::hydrateBase($result, $arr);
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
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /** @param ?string[] $selected new value. */
    function setSelectedFromArray(array $selected)
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
