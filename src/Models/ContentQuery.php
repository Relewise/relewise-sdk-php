<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ContentQuery, Relewise.Client";
    public FilterCollection $filters;
    public int $numberOfResults;
    public ?Language $language;
    public ?Currency $currency;
    public int $skipNumberOfResults;
    public bool $returnTotalNumberOfResults;
    public bool $includeDisabledContents;
    public static function create(?Language $language = Null, ?Currency $currency = Null) : ContentQuery
    {
        $result = new ContentQuery();
        $result->language = $language;
        $result->currency = $currency;
        $result->skipNumberOfResults = 0;
        $result->returnTotalNumberOfResults = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentQuery
    {
        $result = LicensedRequest::hydrateBase(new ContentQuery(), $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("numberOfResults", $arr))
        {
            $result->numberOfResults = $arr["numberOfResults"];
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("skipNumberOfResults", $arr))
        {
            $result->skipNumberOfResults = $arr["skipNumberOfResults"];
        }
        if (array_key_exists("returnTotalNumberOfResults", $arr))
        {
            $result->returnTotalNumberOfResults = $arr["returnTotalNumberOfResults"];
        }
        if (array_key_exists("includeDisabledContents", $arr))
        {
            $result->includeDisabledContents = $arr["includeDisabledContents"];
        }
        return $result;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function setNumberOfResults(int $numberOfResults)
    {
        $this->numberOfResults = $numberOfResults;
        return $this;
    }
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function setSkipNumberOfResults(int $skipNumberOfResults)
    {
        $this->skipNumberOfResults = $skipNumberOfResults;
        return $this;
    }
    function setReturnTotalNumberOfResults(bool $returnTotalNumberOfResults)
    {
        $this->returnTotalNumberOfResults = $returnTotalNumberOfResults;
        return $this;
    }
    function setIncludeDisabledContents(bool $includeDisabledContents)
    {
        $this->includeDisabledContents = $includeDisabledContents;
        return $this;
    }
}
