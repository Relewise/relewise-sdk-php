<?php declare(strict_types=1);

namespace Relewise\Models;

/** Loads all stored feed configurations. */
class FeedConfigurationsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.Feed.FeedConfigurationsRequest, Relewise.Client";
    public static function create() : FeedConfigurationsRequest
    {
        $result = new FeedConfigurationsRequest();
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedConfigurationsRequest
    {
        $result = LicensedRequest::hydrateBase(new FeedConfigurationsRequest(), $arr);
        return $result;
    }
}
