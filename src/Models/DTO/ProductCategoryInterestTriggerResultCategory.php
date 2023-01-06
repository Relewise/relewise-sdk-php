<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
                array_push($result->viewedProducts, CategoryProductAndVariant::hydrate($value));
            }
        }
        return $result;
    }
    function withLastPath(string ... $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    function withViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
    function withViewedProducts(CategoryProductAndVariant ... $viewedProducts)
    {
        $this->viewedProducts = $viewedProducts;
        return $this;
    }
}
