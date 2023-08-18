<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RequestContextFilter
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.RequestContextFilter, Relewise.Client";
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
    /**
     * Sets locations to a new value from an array.
     * @param string[] $locations new value.
     */
    function setLocationsFromArray(array $locations)
    {
        $this->locations = $locations;
        return $this;
    }
    /**
     * Adds a new element to locations.
     * @param string $locations new element.
     */
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
    /**
     * Sets languages to a new value from an array.
     * @param Language[] $languages new value.
     */
    function setLanguagesFromArray(array $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * Adds a new element to languages.
     * @param Language $languages new element.
     */
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
    /**
     * Sets currencies to a new value from an array.
     * @param Currency[] $currencies new value.
     */
    function setCurrenciesFromArray(array $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    /**
     * Adds a new element to currencies.
     * @param Currency $currencies new element.
     */
    function addToCurrencies(Currency $currencies)
    {
        if (!isset($this->currencies))
        {
            $this->currencies = array();
        }
        array_push($this->currencies, $currencies);
        return $this;
    }
}
