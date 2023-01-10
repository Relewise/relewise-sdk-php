<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setBrands(BrandResultDetails ... $brands)
    {
        $this->brands = $brands;
        return $this;
    }
    function addToBrands(BrandResultDetails $brands)
    {
        if (!isset($this->brands))
        {
            $this->brands = array();
        }
        array_push($this->brands, $brands);
        return $this;
    }
    function setTotalNumberOfResults(?int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
