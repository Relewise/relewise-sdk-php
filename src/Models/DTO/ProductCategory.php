<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategory extends Category
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategory, Relewise.Client";
    public static function create() : ProductCategory
    {
        $result = new ProductCategory();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategory
    {
        $result = Category::hydrateBase(new ProductCategory(), $arr);
        return $result;
    }
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withCategoryPaths(CategoryPath ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
