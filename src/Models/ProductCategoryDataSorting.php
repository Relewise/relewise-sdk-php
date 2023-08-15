<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryDataSorting extends ProductCategorySorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryDataSorting, Relewise.Client";
    public string $key;
    public SortMode $mode;
    public static function create(string $key, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductCategoryDataSorting
    {
        $result = new ProductCategoryDataSorting();
        $result->key = $key;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataSorting
    {
        $result = ProductCategorySorting::hydrateBase(new ProductCategoryDataSorting(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets mode to a new value.
     * @param SortMode $mode new value.
     */
    function setMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    /**
     * Sets order to a new value.
     * @param SortOrder $order new value.
     */
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    /**
     * Sets thenBy to a new value.
     * @param ProductCategorySorting $thenBy new value.
     */
    function setThenBy(ProductCategorySorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
