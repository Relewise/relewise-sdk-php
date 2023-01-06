<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class UserDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.UserDetailsCollectionResponse, Relewise.Client";
    public array $results;
    public static function create(array ... $results) : UserDetailsCollectionResponse
    {
        $result = new UserDetailsCollectionResponse();
        $result->results = $results;
        return $result;
    }
    public static function hydrate(array $arr) : UserDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new UserDetailsCollectionResponse(), $arr);
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, $value);
            }
        }
        return $result;
    }
    function withResults(array ... $results)
    {
        $this->results = $results;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
