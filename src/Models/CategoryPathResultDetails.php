<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryPathResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryPathResultDetails, Relewise.Client";
    public array $breadcrumbPathStartingFromRoot;
    public static function create(CategoryNameAndId ... $breadcrumbPathStartingFromRoot) : CategoryPathResultDetails
    {
        $result = new CategoryPathResultDetails();
        $result->breadcrumbPathStartingFromRoot = $breadcrumbPathStartingFromRoot;
        return $result;
    }
    public static function hydrate(array $arr) : CategoryPathResultDetails
    {
        $result = new CategoryPathResultDetails();
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
    /**
     * Sets breadcrumbPathStartingFromRoot to a new value from an array.
     * @param CategoryNameAndId[] $breadcrumbPathStartingFromRoot new value.
     */
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
