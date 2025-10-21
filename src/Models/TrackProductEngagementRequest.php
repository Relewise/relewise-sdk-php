<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackProductEngagementRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductEngagementRequest, Relewise.Client";
    public ProductEngagement $productEngagement;
    
    public static function create(ProductEngagement $productEngagement) : TrackProductEngagementRequest
    {
        $result = new TrackProductEngagementRequest();
        $result->productEngagement = $productEngagement;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackProductEngagementRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductEngagementRequest(), $arr);
        if (array_key_exists("productEngagement", $arr))
        {
            $result->productEngagement = ProductEngagement::hydrate($arr["productEngagement"]);
        }
        return $result;
    }
    
    function setProductEngagement(ProductEngagement $productEngagement)
    {
        $this->productEngagement = $productEngagement;
        return $this;
    }
}
