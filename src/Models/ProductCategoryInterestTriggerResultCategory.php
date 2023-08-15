<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryInterestTriggerResultCategory
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult+Category, Relewise.Client";
    public array $lastPath;
    public int $views;
    public array $viewedProducts;
    public static function create() : ProductCategoryInterestTriggerResultCategory
    {
        $result = new ProductCategoryInterestTriggerResultCategory();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryInterestTriggerResultCategory
    {
        $result = new ProductCategoryInterestTriggerResultCategory();
        if (array_key_exists("lastPath", $arr))
        {
            $result->lastPath = array();
            foreach($arr["lastPath"] as &$value)
            {
                array_push($result->lastPath, $value);
            }
        }
        if (array_key_exists("views", $arr))
        {
            $result->views = $arr["views"];
        }
        if (array_key_exists("viewedProducts", $arr))
        {
            $result->viewedProducts = array();
            foreach($arr["viewedProducts"] as &$value)
            {
                array_push($result->viewedProducts, CategoryProductAndVariant::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets lastPath to a new value.
     * @param string[] $lastPath new value.
     */
    function setLastPath(string ... $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    /**
     * Sets lastPath to a new value from an array.
     * @param string[] $lastPath new value.
     */
    function setLastPathFromArray(array $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    /**
     * Adds a new element to lastPath.
     * @param string $lastPath new element.
     */
    function addToLastPath(string $lastPath)
    {
        if (!isset($this->lastPath))
        {
            $this->lastPath = array();
        }
        array_push($this->lastPath, $lastPath);
        return $this;
    }
    /**
     * Sets views to a new value.
     * @param int $views new value.
     */
    function setViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
    /**
     * Sets viewedProducts to a new value.
     * @param CategoryProductAndVariant[] $viewedProducts new value.
     */
    function setViewedProducts(CategoryProductAndVariant ... $viewedProducts)
    {
        $this->viewedProducts = $viewedProducts;
        return $this;
    }
    /**
     * Sets viewedProducts to a new value from an array.
     * @param CategoryProductAndVariant[] $viewedProducts new value.
     */
    function setViewedProductsFromArray(array $viewedProducts)
    {
        $this->viewedProducts = $viewedProducts;
        return $this;
    }
    /**
     * Adds a new element to viewedProducts.
     * @param CategoryProductAndVariant $viewedProducts new element.
     */
    function addToViewedProducts(CategoryProductAndVariant $viewedProducts)
    {
        if (!isset($this->viewedProducts))
        {
            $this->viewedProducts = array();
        }
        array_push($this->viewedProducts, $viewedProducts);
        return $this;
    }
}
