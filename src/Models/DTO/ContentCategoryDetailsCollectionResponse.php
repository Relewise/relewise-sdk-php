<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ContentCategoryDetailsCollectionResponse, Relewise.Client";
    public array $categories;
    public ?int $totalNumberOfResults;
    public static function create(array $categories, ?int $totalNumberOfResults) : ContentCategoryDetailsCollectionResponse
    {
        $result = new ContentCategoryDetailsCollectionResponse();
        $result->categories = $categories;
        $result->totalNumberOfResults = $totalNumberOfResults;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new ContentCategoryDetailsCollectionResponse(), $arr);
        if (array_key_exists("categories", $arr))
        {
            $result->categories = array();
            foreach($arr["categories"] as &$value)
            {
                array_push($result->categories, ContentCategoryResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("totalNumberOfResults", $arr))
        {
            $result->totalNumberOfResults = $arr["totalNumberOfResults"];
        }
        return $result;
    }
    function withCategories(ContentCategoryResultDetails ... $categories)
    {
        $this->categories = $categories;
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
