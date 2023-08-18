<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataObjectSorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductDataObjectSorting, Relewise.Client";
    public DataSelectionStrategy $dataSelectionStrategy;
    public SortMode $mode;
    public DataObjectValueSelector $valueSelector;
    public static function create(DataSelectionStrategy $dataSelectionStrategy, SortOrder $order, DataObjectValueSelector $valueSelector, SortMode $mode = SortMode::Auto) : ProductDataObjectSorting
    {
        $result = new ProductDataObjectSorting();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->order = $order;
        $result->valueSelector = $valueSelector;
        $result->mode = $mode;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataObjectSorting
    {
        $result = ProductSorting::hydrateBase(new ProductDataObjectSorting(), $arr);
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        if (array_key_exists("valueSelector", $arr))
        {
            $result->valueSelector = DataObjectValueSelector::hydrate($arr["valueSelector"]);
        }
        return $result;
    }
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    function setMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    function setValueSelector(DataObjectValueSelector $valueSelector)
    {
        $this->valueSelector = $valueSelector;
        return $this;
    }
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    function setThenBy(ProductSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
