<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ProductQuery, Relewise.Client";
    public ?FilterCollection $filters;
    
    /** @deprecated For better paging support, please use NextPageToken and PageSize */
    public int $numberOfResults;
    
    public ?Language $language;
    
    public ?Currency $currency;
    
    /** @deprecated For better paging support, please use NextPageToken and PageSize */
    public int $skipNumberOfResults;
    
    public bool $returnTotalNumberOfResults;
    
    public bool $includeDisabledProducts;
    
    public bool $includeDisabledVariants;
    
    public bool $excludeProductsWithNoVariants;
    
    /** The identifier for the ProductQuery paged cursor, to consume results in PageSize batches. Leave as null for retrieving the first page, and set to the value returned in NextPageToken for any subsequent page requests. <remarks>Should a wrong/unexisting token be supplied, a 'Validation' exception shall be returned.</remarks> */
    public ?string $nextPageToken;
    
    /** The size of the page requested. <remarks>Maximum allowed value is 1000.</remarks> */
    public ?int $pageSize;
    
    /** Settings for which properties should be included for the entities in the response. If settings are not set they default to include everything. */
    public ?ProductQuerySelectedPropertiesSettings $resultSettings;
    
    public static function create(?Language $language = Null, ?Currency $currency = Null) : ProductQuery
    {
        $result = new ProductQuery();
        $result->language = $language;
        $result->currency = $currency;
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
        if (array_key_exists("nextPageToken", $arr))
        {
            $result->nextPageToken = $arr["nextPageToken"];
        }
        if (array_key_exists("pageSize", $arr))
        {
            $result->pageSize = $arr["pageSize"];
        }
        if (array_key_exists("resultSettings", $arr))
        {
            $result->resultSettings = ProductQuerySelectedPropertiesSettings::hydrate($arr["resultSettings"]);
        }
        return $result;
    }
    
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    /** @deprecated For better paging support, please use NextPageToken and PageSize */
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
    
    /** @deprecated For better paging support, please use NextPageToken and PageSize */
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
    
    function setIncludeDisabledProducts(bool $includeDisabledProducts)
    {
        $this->includeDisabledProducts = $includeDisabledProducts;
        return $this;
    }
    
    function setIncludeDisabledVariants(bool $includeDisabledVariants)
    {
        $this->includeDisabledVariants = $includeDisabledVariants;
        return $this;
    }
    
    function setExcludeProductsWithNoVariants(bool $excludeProductsWithNoVariants)
    {
        $this->excludeProductsWithNoVariants = $excludeProductsWithNoVariants;
        return $this;
    }
    
    /** The identifier for the ProductQuery paged cursor, to consume results in PageSize batches. Leave as null for retrieving the first page, and set to the value returned in NextPageToken for any subsequent page requests. <remarks>Should a wrong/unexisting token be supplied, a 'Validation' exception shall be returned.</remarks> */
    function setNextPageToken(?string $nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
        return $this;
    }
    
    /** The size of the page requested. <remarks>Maximum allowed value is 1000.</remarks> */
    function setPageSize(?int $pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }
    
    /** Settings for which properties should be included for the entities in the response. If settings are not set they default to include everything. */
    function setResultSettings(?ProductQuerySelectedPropertiesSettings $resultSettings)
    {
        $this->resultSettings = $resultSettings;
        return $this;
    }
}
