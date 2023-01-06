<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackProductViewRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductViewRequest, Relewise.Client";
    public ProductView $productView;
    public static function create(ProductView $productView) : TrackProductViewRequest
    {
        $result = new TrackProductViewRequest();
        $result->productView = $productView;
        return $result;
    }
    public static function hydrate(array $arr) : TrackProductViewRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductViewRequest(), $arr);
        if (array_key_exists("productView", $arr))
        {
            $result->productView = ProductView::hydrate($arr["productView"]);
        }
        return $result;
    }
    function withProductView(ProductView $productView)
    {
        $this->productView = $productView;
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
