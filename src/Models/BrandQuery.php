<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.BrandQuery, Relewise.Client";
    public FilterCollection $filters;
    public int $numberOfResults;
    public ?Language $language;
    public ?Currency $currency;
    public int $skipNumberOfResults;
    public bool $returnTotalNumberOfResults;
    public bool $includeDisabledBrands;
    public static function create(?Language $language = Null, ?Currency $currency = Null) : BrandQuery
    {
        $result = new BrandQuery();
        $result->language = $language;
        $result->currency = $currency;
        $result->skipNumberOfResults = 0;
        $result->returnTotalNumberOfResults = false;
        return $result;
    }
    public static function hydrate(array $arr) : BrandQuery
    {
        $result = LicensedRequest::hydrateBase(new BrandQuery(), $arr);
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
        if (array_key_exists("includeDisabledBrands", $arr))
        {
            $result->includeDisabledBrands = $arr["includeDisabledBrands"];
        }
        return $result;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets numberOfResults to a new value.
     * @param int $numberOfResults new value.
     */
    function setNumberOfResults(int $numberOfResults)
    {
        $this->numberOfResults = $numberOfResults;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Sets skipNumberOfResults to a new value.
     * @param int $skipNumberOfResults new value.
     */
    function setSkipNumberOfResults(int $skipNumberOfResults)
    {
        $this->skipNumberOfResults = $skipNumberOfResults;
        return $this;
    }
    /**
     * Sets returnTotalNumberOfResults to a new value.
     * @param bool $returnTotalNumberOfResults new value.
     */
    function setReturnTotalNumberOfResults(bool $returnTotalNumberOfResults)
    {
        $this->returnTotalNumberOfResults = $returnTotalNumberOfResults;
        return $this;
    }
    /**
     * Sets includeDisabledBrands to a new value.
     * @param bool $includeDisabledBrands new value.
     */
    function setIncludeDisabledBrands(bool $includeDisabledBrands)
    {
        $this->includeDisabledBrands = $includeDisabledBrands;
        return $this;
    }
}
