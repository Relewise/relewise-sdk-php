<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackBrandUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackBrandUpdateRequest, Relewise.Client";
    
    public BrandUpdate $brandUpdate;
    public static function create(BrandUpdate $brandUpdate) : TrackBrandUpdateRequest
    {
        $result = new TrackBrandUpdateRequest();
        $result->brandUpdate = $brandUpdate;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackBrandUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackBrandUpdateRequest(), $arr);
        if (array_key_exists("brandUpdate", $arr))
        {
            $result->brandUpdate = BrandUpdate::hydrate($arr["brandUpdate"]);
        }
        return $result;
    }
    
    function setBrandUpdate(BrandUpdate $brandUpdate)
    {
        $this->brandUpdate = $brandUpdate;
        return $this;
    }
}
