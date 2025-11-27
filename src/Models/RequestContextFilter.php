<?php declare(strict_types=1);

namespace Relewise\Models;

class RequestContextFilter
{
    public RecommendationTypeCollection $recommendations;
    public SearchTypeCollection $searches;
    public array $locations;
    public array $languages;
    public array $currencies;
    public RequestFilterCriteria $filters;
    /** @deprecated Use SearchTermCriteria instead */
    public ?SearchTermConditionByLanguageCollection $searchTerms;
    public ?SearchTermCriteria $searchTermCriteria;
    
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
        if (array_key_exists("filters", $arr))
        {
            $result->filters = RequestFilterCriteria::hydrate($arr["filters"]);
        }
        if (array_key_exists("searchTerms", $arr))
        {
            $result->searchTerms = SearchTermConditionByLanguageCollection::hydrate($arr["searchTerms"]);
        }
        if (array_key_exists("searchTermCriteria", $arr))
        {
            $result->searchTermCriteria = SearchTermCriteria::hydrate($arr["searchTermCriteria"]);
        }
        return $result;
    }
    
    function setRecommendations(RecommendationTypeCollection $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    function setSearches(SearchTypeCollection $searches)
    {
        $this->searches = $searches;
        return $this;
    }
    
    function setLocations(string ... $locations)
    {
        $this->locations = $locations;
        return $this;
    }
    
    /** @param string[] $locations new value. */
    function setLocationsFromArray(array $locations)
    {
        $this->locations = $locations;
        return $this;
    }
    
    function addToLocations(string $locations)
    {
        if (!isset($this->locations))
        {
            $this->locations = array();
        }
        array_push($this->locations, $locations);
        return $this;
    }
    
    function setLanguages(Language ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    
    /** @param Language[] $languages new value. */
    function setLanguagesFromArray(array $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    
    function addToLanguages(Language $languages)
    {
        if (!isset($this->languages))
        {
            $this->languages = array();
        }
        array_push($this->languages, $languages);
        return $this;
    }
    
    function setCurrencies(Currency ... $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    
    /** @param Currency[] $currencies new value. */
    function setCurrenciesFromArray(array $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    
    function addToCurrencies(Currency $currencies)
    {
        if (!isset($this->currencies))
        {
            $this->currencies = array();
        }
        array_push($this->currencies, $currencies);
        return $this;
    }
    
    function setFilters(RequestFilterCriteria $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    /** @deprecated Use SearchTermCriteria instead */
    function setSearchTerms(?SearchTermConditionByLanguageCollection $searchTerms)
    {
        $this->searchTerms = $searchTerms;
        return $this;
    }
    
    function setSearchTermCriteria(?SearchTermCriteria $searchTermCriteria)
    {
        $this->searchTermCriteria = $searchTermCriteria;
        return $this;
    }
}
