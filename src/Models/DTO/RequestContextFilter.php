<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RequestContextFilter
{
    public RecommendationTypeCollection $recommendations;
    public SearchTypeCollection $searches;
    public array $locations;
    public array $languages;
    public array $currencies;
    public static function create() : RequestContextFilter
    {
        $result = new RequestContextFilter();
        return $result;
    }
    public static function hydrate(array $arr) : RequestContextFilter
    {
        $result = new RequestContextFilter();
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = RecommendationTypeCollection::hydrate($arr["recommendations"]);
        }
        if (array_key_exists("searches", $arr))
        {
            $result->searches = SearchTypeCollection::hydrate($arr["searches"]);
        }
        if (array_key_exists("locations", $arr))
        {
            $result->locations = array();
            foreach($arr["locations"] as &$value)
            {
                array_push($result->locations, $value);
            }
        }
        if (array_key_exists("languages", $arr))
        {
            $result->languages = array();
            foreach($arr["languages"] as &$value)
            {
                array_push($result->languages, Language::hydrate($value));
            }
        }
        if (array_key_exists("currencies", $arr))
        {
            $result->currencies = array();
            foreach($arr["currencies"] as &$value)
            {
                array_push($result->currencies, Currency::hydrate($value));
            }
        }
        return $result;
    }
    function withRecommendations(RecommendationTypeCollection $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function withSearches(SearchTypeCollection $searches)
    {
        $this->searches = $searches;
        return $this;
    }
    function withLocations(string ... $locations)
    {
        $this->locations = $locations;
        return $this;
    }
    function withLanguages(Language ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function withCurrencies(Currency ... $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
}
