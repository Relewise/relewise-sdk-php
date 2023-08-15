<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandRecommendationWeights
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.BrandRecommendationWeights, Relewise.Client";
    public float $brandViews;
    public float $productViews;
    public float $productPurchases;
    public static function create(float $brandViews = 1, float $productViews = 1, float $productPurchases = 1) : BrandRecommendationWeights
    {
        $result = new BrandRecommendationWeights();
        $result->brandViews = $brandViews;
        $result->productViews = $productViews;
        $result->productPurchases = $productPurchases;
        return $result;
    }
    public static function hydrate(array $arr) : BrandRecommendationWeights
    {
        $result = new BrandRecommendationWeights();
        if (array_key_exists("brandViews", $arr))
        {
            $result->brandViews = $arr["brandViews"];
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
     * Sets brandViews to a new value.
     * @param float $brandViews new value.
     */
    function setBrandViews(float $brandViews)
    {
        $this->brandViews = $brandViews;
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
