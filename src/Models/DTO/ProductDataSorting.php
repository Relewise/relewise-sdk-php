<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataSorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductDataSorting, Relewise.Client";
    public string $key;
    public DataSelectionStrategy $dataSelectionStrategy;
    public SortMode $mode;
    public static function create(string $key, DataSelectionStrategy $dataSelectionStrategy, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductDataSorting
    {
        $result = new ProductDataSorting();
        $result->key = $key;
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataSorting
    {
        $result = ProductSorting::hydrateBase(new ProductDataSorting(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    function withMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    function withOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    function withThenBy(ProductSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
