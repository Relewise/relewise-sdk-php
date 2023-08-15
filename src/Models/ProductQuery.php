<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ProductQuery, Relewise.Client";
    public FilterCollection $filters;
    public int $numberOfResults;
    public ?Language $language;
    public ?Currency $currency;
    public int $skipNumberOfResults;
    public bool $returnTotalNumberOfResults;
    public bool $includeDisabledProducts;
    public bool $includeDisabledVariants;
    public bool $excludeProductsWithNoVariants;
    public static function create(?Language $language = Null, ?Currency $currency = Null) : ProductQuery
    {
        $result = new ProductQuery();
        $result->language = $language;
        $result->currency = $currency;
        $result->skipNumberOfResults = 0;
        $result->returnTotalNumberOfResults = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductQuery
    {
        $result = LicensedRequest::hydrateBase(new ProductQuery(), $arr);
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
        if (array_key_exists("includeDisabledProducts", $arr))
        {
            $result->includeDisabledProducts = $arr["includeDisabledProducts"];
        }
        if (array_key_exists("includeDisabledVariants", $arr))
        {
            $result->includeDisabledVariants = $arr["includeDisabledVariants"];
        }
        if (array_key_exists("excludeProductsWithNoVariants", $arr))
        {
            $result->excludeProductsWithNoVariants = $arr["excludeProductsWithNoVariants"];
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
     * Sets includeDisabledProducts to a new value.
     * @param bool $includeDisabledProducts new value.
     */
    function setIncludeDisabledProducts(bool $includeDisabledProducts)
    {
        $this->includeDisabledProducts = $includeDisabledProducts;
        return $this;
    }
    /**
     * Sets includeDisabledVariants to a new value.
     * @param bool $includeDisabledVariants new value.
     */
    function setIncludeDisabledVariants(bool $includeDisabledVariants)
    {
        $this->includeDisabledVariants = $includeDisabledVariants;
        return $this;
    }
    /**
     * Sets excludeProductsWithNoVariants to a new value.
     * @param bool $excludeProductsWithNoVariants new value.
     */
    function setExcludeProductsWithNoVariants(bool $excludeProductsWithNoVariants)
    {
        $this->excludeProductsWithNoVariants = $excludeProductsWithNoVariants;
        return $this;
    }
}
