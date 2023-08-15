<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets categories to a new value.
     * @param ContentCategoryResultDetails[] $categories new value.
     */
    function setCategories(ContentCategoryResultDetails ... $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    /**
     * Sets categories to a new value from an array.
     * @param ContentCategoryResultDetails[] $categories new value.
     */
    function setCategoriesFromArray(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    /**
     * Adds a new element to categories.
     * @param ContentCategoryResultDetails $categories new element.
     */
    function addToCategories(ContentCategoryResultDetails $categories)
    {
        if (!isset($this->categories))
        {
            $this->categories = array();
        }
        array_push($this->categories, $categories);
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
