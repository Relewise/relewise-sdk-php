<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets brandUpdate to a new value.
     * @param BrandUpdate $brandUpdate new value.
     */
    function setBrandUpdate(BrandUpdate $brandUpdate)
    {
        $this->brandUpdate = $brandUpdate;
        return $this;
    }
}
