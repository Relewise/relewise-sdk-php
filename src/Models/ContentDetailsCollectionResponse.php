<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets contents to a new value.
     * @param ContentResultDetails[] $contents new value.
     */
    function setContents(ContentResultDetails ... $contents)
    {
        $this->contents = $contents;
        return $this;
    }
    /**
     * Sets contents to a new value from an array.
     * @param ContentResultDetails[] $contents new value.
     */
    function setContentsFromArray(array $contents)
    {
        $this->contents = $contents;
        return $this;
    }
    /**
     * Adds a new element to contents.
     * @param ContentResultDetails $contents new element.
     */
    function addToContents(ContentResultDetails $contents)
    {
        if (!isset($this->contents))
        {
            $this->contents = array();
        }
        array_push($this->contents, $contents);
        return $this;
    }
    /**
     * Sets totalNumberOfResults to a new value.
     * @param ?int $totalNumberOfResults new value.
     */
    function setTotalNumberOfResults(?int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
