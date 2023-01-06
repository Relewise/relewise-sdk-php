<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ContentDetailsCollectionResponse, Relewise.Client";
    public array $contents;
    public ?int $totalNumberOfResults;
    public static function create(array $contents, ?int $totalNumberOfResults) : ContentDetailsCollectionResponse
    {
        $result = new ContentDetailsCollectionResponse();
        $result->contents = $contents;
        $result->totalNumberOfResults = $totalNumberOfResults;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new ContentDetailsCollectionResponse(), $arr);
        if (array_key_exists("contents", $arr))
        {
            $result->contents = array();
            foreach($arr["contents"] as &$value)
            {
                array_push($result->contents, ContentResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("totalNumberOfResults", $arr))
        {
            $result->totalNumberOfResults = $arr["totalNumberOfResults"];
        }
        return $result;
    }
    function withContents(ContentResultDetails ... $contents)
    {
        $this->contents = $contents;
        return $this;
    }
    function withTotalNumberOfResults(?int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
