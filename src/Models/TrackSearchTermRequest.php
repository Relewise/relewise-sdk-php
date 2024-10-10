<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackSearchTermRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackSearchTermRequest, Relewise.Client";
    public SearchTerm $searchTerm;
    public static function create(SearchTerm $searchTerm) : TrackSearchTermRequest
    {
        $result = new TrackSearchTermRequest();
        $result->searchTerm = $searchTerm;
        return $result;
    }
    public static function hydrate(array $arr) : TrackSearchTermRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackSearchTermRequest(), $arr);
        if (array_key_exists("searchTerm", $arr))
        {
            $result->searchTerm = SearchTerm::hydrate($arr["searchTerm"]);
        }
        return $result;
    }
    
    function setSearchTerm(SearchTerm $searchTerm)
    {
        $this->searchTerm = $searchTerm;
        return $this;
    }
}
