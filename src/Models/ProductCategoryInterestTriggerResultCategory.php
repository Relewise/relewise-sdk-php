<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryInterestTriggerResultCategory
{
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
                array_push($result->viewedProducts, ProductCategoryInterestTriggerResultCategoryProductAndVariant::hydrate($value));
            }
        }
        return $result;
    }
    
    function setLastPath(string ... $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    
    /** @param string[] $lastPath new value. */
    function setLastPathFromArray(array $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    
    function addToLastPath(string $lastPath)
    {
        if (!isset($this->lastPath))
        {
            $this->lastPath = array();
        }
        array_push($this->lastPath, $lastPath);
        return $this;
    }
    
    function setViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
    
    function setViewedProducts(ProductCategoryInterestTriggerResultCategoryProductAndVariant ... $viewedProducts)
    {
        $this->viewedProducts = $viewedProducts;
        return $this;
    }
    
    /** @param ProductCategoryInterestTriggerResultCategoryProductAndVariant[] $viewedProducts new value. */
    function setViewedProductsFromArray(array $viewedProducts)
    {
        $this->viewedProducts = $viewedProducts;
        return $this;
    }
    
    function addToViewedProducts(ProductCategoryInterestTriggerResultCategoryProductAndVariant $viewedProducts)
    {
        if (!isset($this->viewedProducts))
        {
            $this->viewedProducts = array();
        }
        array_push($this->viewedProducts, $viewedProducts);
        return $this;
    }
}
