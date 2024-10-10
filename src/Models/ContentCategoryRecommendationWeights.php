<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategoryRecommendationWeights
{
    public float $categoryViews;
    public float $contentViews;
    
    public static function create(float $categoryViews = 1, float $contentViews = 1) : ContentCategoryRecommendationWeights
    {
        $result = new ContentCategoryRecommendationWeights();
        $result->categoryViews = $categoryViews;
        $result->contentViews = $contentViews;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategoryRecommendationWeights
    {
        $result = new ContentCategoryRecommendationWeights();
        if (array_key_exists("categoryViews", $arr))
        {
            $result->categoryViews = $arr["categoryViews"];
        }
        if (array_key_exists("contentViews", $arr))
        {
            $result->contentViews = $arr["contentViews"];
        }
        return $result;
    }
    
    function setCategoryViews(float $categoryViews)
    {
        $this->categoryViews = $categoryViews;
        return $this;
    }
    
    function setContentViews(float $contentViews)
    {
        $this->contentViews = $contentViews;
        return $this;
    }
}
