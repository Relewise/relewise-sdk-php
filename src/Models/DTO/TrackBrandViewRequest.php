<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackBrandViewRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackBrandViewRequest, Relewise.Client";
    public BrandView $brandView;
    public static function create(BrandView $brandView) : TrackBrandViewRequest
    {
        $result = new TrackBrandViewRequest();
        $result->brandView = $brandView;
        return $result;
    }
    public static function hydrate(array $arr) : TrackBrandViewRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackBrandViewRequest(), $arr);
        if (array_key_exists("brandView", $arr))
        {
            $result->brandView = BrandView::hydrate($arr["brandView"]);
        }
        return $result;
    }
    function withBrandView(BrandView $brandView)
    {
        $this->brandView = $brandView;
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
