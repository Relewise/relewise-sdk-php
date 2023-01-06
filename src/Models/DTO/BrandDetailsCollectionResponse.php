<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.BrandDetailsCollectionResponse, Relewise.Client";
    public array $brands;
    public ?int $totalNumberOfResults;
    public static function create(array $brands, ?int $totalNumberOfResults) : BrandDetailsCollectionResponse
    {
        $result = new BrandDetailsCollectionResponse();
        $result->brands = $brands;
        $result->totalNumberOfResults = $totalNumberOfResults;
        return $result;
    }
    public static function hydrate(array $arr) : BrandDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new BrandDetailsCollectionResponse(), $arr);
        if (array_key_exists("brands", $arr))
        {
            $result->brands = array();
            foreach($arr["brands"] as &$value)
            {
                array_push($result->brands, BrandResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("totalNumberOfResults", $arr))
        {
            $result->totalNumberOfResults = $arr["totalNumberOfResults"];
        }
        return $result;
    }
    function withBrands(BrandResultDetails ... $brands)
    {
        $this->brands = $brands;
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
