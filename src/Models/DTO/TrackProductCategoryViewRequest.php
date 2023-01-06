<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackProductCategoryViewRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductCategoryViewRequest, Relewise.Client";
    public ProductCategoryView $productCategoryView;
    public static function create(ProductCategoryView $productCategoryView) : TrackProductCategoryViewRequest
    {
        $result = new TrackProductCategoryViewRequest();
        $result->productCategoryView = $productCategoryView;
        return $result;
    }
    public static function hydrate(array $arr) : TrackProductCategoryViewRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductCategoryViewRequest(), $arr);
        if (array_key_exists("productCategoryView", $arr))
        {
            $result->productCategoryView = ProductCategoryView::hydrate($arr["productCategoryView"]);
        }
        return $result;
    }
    function withProductCategoryView(ProductCategoryView $productCategoryView)
    {
        $this->productCategoryView = $productCategoryView;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
