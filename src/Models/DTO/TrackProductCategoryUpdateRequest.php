<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackProductCategoryUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductCategoryUpdateRequest, Relewise.Client";
    public ProductCategoryUpdate $productCategoryUpdate;
    public static function create(ProductCategoryUpdate $productCategoryUpdate) : TrackProductCategoryUpdateRequest
    {
        $result = new TrackProductCategoryUpdateRequest();
        $result->productCategoryUpdate = $productCategoryUpdate;
        return $result;
    }
    public static function hydrate(array $arr) : TrackProductCategoryUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductCategoryUpdateRequest(), $arr);
        if (array_key_exists("productCategoryUpdate", $arr))
        {
            $result->productCategoryUpdate = ProductCategoryUpdate::hydrate($arr["productCategoryUpdate"]);
        }
        return $result;
    }
    function withProductCategoryUpdate(ProductCategoryUpdate $productCategoryUpdate)
    {
        $this->productCategoryUpdate = $productCategoryUpdate;
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
