<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackProductUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductUpdateRequest, Relewise.Client";
    public ProductUpdate $productUpdate;
    public static function create(ProductUpdate $productUpdate) : TrackProductUpdateRequest
    {
        $result = new TrackProductUpdateRequest();
        $result->productUpdate = $productUpdate;
        return $result;
    }
    public static function hydrate(array $arr) : TrackProductUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductUpdateRequest(), $arr);
        if (array_key_exists("productUpdate", $arr))
        {
            $result->productUpdate = ProductUpdate::hydrate($arr["productUpdate"]);
        }
        return $result;
    }
    function setProductUpdate(ProductUpdate $productUpdate)
    {
        $this->productUpdate = $productUpdate;
        return $this;
    }
}
