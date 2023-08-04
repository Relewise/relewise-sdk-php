<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Used to specify the full path of a product/lineitem, starting at the root &gt; subcategory &gt; subcategory2 etc. */
class CategoryPath
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryPath, Relewise.Client";
    public array $breadcrumbPathStartingFromRoot;
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
