<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used to specify the full path of a product/lineitem, starting at the root > subcategory > subcategory2 etc. */
class CategoryPath
{
    public array $breadcrumbPathStartingFromRoot;
    
    /**
     * The full path of the products, starting at the root > subcategory > subcategory2 etc. If you dont have a category id available, provide the Category name for both ID and Name, and the same if you have an ID, but not a Name. Example: new CategoryPath(new CategoryNameAndId("515", "Soups"), new CategoryNameAndId("518", "Vegetable soups"))
     * @param CategoryNameAndId[] $breadcrumbPathStartingFromRoot Example: new CategoryPath(new CategoryNameAndId("515", "Soups"), new CategoryNameAndId("518", "Vegetable soups"))
     */
    public static function create(CategoryNameAndId ... $breadcrumbPathStartingFromRoot) : CategoryPath
    {
        $result = new CategoryPath();
        $result->breadcrumbPathStartingFromRoot = $breadcrumbPathStartingFromRoot;
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryPath
    {
        $result = new CategoryPath();
        if (array_key_exists("breadcrumbPathStartingFromRoot", $arr))
        {
            $result->breadcrumbPathStartingFromRoot = array();
            foreach($arr["breadcrumbPathStartingFromRoot"] as &$value)
            {
                array_push($result->breadcrumbPathStartingFromRoot, CategoryNameAndId::hydrate($value));
            }
        }
        return $result;
    }
    
    function setBreadcrumbPathStartingFromRoot(CategoryNameAndId ... $breadcrumbPathStartingFromRoot)
    {
        $this->breadcrumbPathStartingFromRoot = $breadcrumbPathStartingFromRoot;
        return $this;
    }
    
    /** @param CategoryNameAndId[] $breadcrumbPathStartingFromRoot new value. */
    function setBreadcrumbPathStartingFromRootFromArray(array $breadcrumbPathStartingFromRoot)
    {
        $this->breadcrumbPathStartingFromRoot = $breadcrumbPathStartingFromRoot;
        return $this;
    }
    
    function addToBreadcrumbPathStartingFromRoot(CategoryNameAndId $breadcrumbPathStartingFromRoot)
    {
        if (!isset($this->breadcrumbPathStartingFromRoot))
        {
            $this->breadcrumbPathStartingFromRoot = array();
        }
        array_push($this->breadcrumbPathStartingFromRoot, $breadcrumbPathStartingFromRoot);
        return $this;
    }
}
