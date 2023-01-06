<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ProductQuery, Relewise.Client";
    public FilterCollection $filters;
    public int $numberOfResults;
    public Language $language;
    public Currency $currency;
    public int $skipNumberOfResults;
    public bool $returnTotalNumberOfResults;
    public bool $includeDisabledProducts;
    public bool $includeDisabledVariants;
    public bool $excludeProductsWithNoVariants;
    public static function create(Language $language, Currency $currency) : ProductQuery
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
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withNumberOfResults(int $numberOfResults)
    {
        $this->numberOfResults = $numberOfResults;
        return $this;
    }
    function withLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withSkipNumberOfResults(int $skipNumberOfResults)
    {
        $this->skipNumberOfResults = $skipNumberOfResults;
        return $this;
    }
    function withReturnTotalNumberOfResults(bool $returnTotalNumberOfResults)
    {
        $this->returnTotalNumberOfResults = $returnTotalNumberOfResults;
        return $this;
    }
    function withIncludeDisabledProducts(bool $includeDisabledProducts)
    {
        $this->includeDisabledProducts = $includeDisabledProducts;
        return $this;
    }
    function withIncludeDisabledVariants(bool $includeDisabledVariants)
    {
        $this->includeDisabledVariants = $includeDisabledVariants;
        return $this;
    }
    function withExcludeProductsWithNoVariants(bool $excludeProductsWithNoVariants)
    {
        $this->excludeProductsWithNoVariants = $excludeProductsWithNoVariants;
        return $this;
    }
}
