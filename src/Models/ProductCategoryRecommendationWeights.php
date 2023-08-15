<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryRecommendationWeights
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductCategoryRecommendationWeights, Relewise.Client";
    public float $categoryViews;
    public float $productViews;
    public float $productPurchases;
    public static function create(float $categoryViews = 1, float $productViews = 1, float $productPurchases = 1) : ProductCategoryRecommendationWeights
    {
        $result = new ProductCategoryRecommendationWeights();
        $result->categoryViews = $categoryViews;
        $result->productViews = $productViews;
        $result->productPurchases = $productPurchases;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryRecommendationWeights
    {
        $result = new ProductCategoryRecommendationWeights();
        if (array_key_exists("categoryViews", $arr))
        {
            $result->categoryViews = $arr["categoryViews"];
        }
        if (array_key_exists("productViews", $arr))
        {
            $result->productViews = $arr["productViews"];
        }
        if (array_key_exists("productPurchases", $arr))
        {
            $result->productPurchases = $arr["productPurchases"];
        }
        return $result;
    }
    /**
     * Sets categoryViews to a new value.
     * @param float $categoryViews new value.
     */
    function setCategoryViews(float $categoryViews)
    {
        $this->categoryViews = $categoryViews;
        return $this;
    }
    /**
     * Sets productViews to a new value.
     * @param float $productViews new value.
     */
    function setProductViews(float $productViews)
    {
        $this->productViews = $productViews;
        return $this;
    }
    /**
     * Sets productPurchases to a new value.
     * @param float $productPurchases new value.
     */
    function setProductPurchases(float $productPurchases)
    {
        $this->productPurchases = $productPurchases;
        return $this;
    }
}
