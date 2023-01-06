<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withSearchTerm(SearchTerm $searchTerm)
    {
        $this->searchTerm = $searchTerm;
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
