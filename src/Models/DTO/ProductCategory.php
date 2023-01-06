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
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setCategoryPaths(CategoryPath ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
}
