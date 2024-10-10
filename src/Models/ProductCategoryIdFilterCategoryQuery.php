<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ProductCategoryIdFilterCategoryQuery extends LicensedRequest
{
    public string $typeDefinition = "";
    public FilterCollection $filters;
    public int $numberOfResults;
    public ?Language $language;
    public ?Currency $currency;
    public int $skipNumberOfResults;
    public bool $returnTotalNumberOfResults;
    public bool $includeDisabledCategories;
    public int $includeChildCategoriesToDepth;
    public int $includeParentCategoriesToDepth;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Queries.ProductCategoryQuery, Relewise.Client")
        {
            return ProductCategoryQuery::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
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
        if (array_key_exists("includeDisabledCategories", $arr))
        {
            $result->includeDisabledCategories = $arr["includeDisabledCategories"];
        }
        if (array_key_exists("includeChildCategoriesToDepth", $arr))
        {
            $result->includeChildCategoriesToDepth = $arr["includeChildCategoriesToDepth"];
        }
        if (array_key_exists("includeParentCategoriesToDepth", $arr))
        {
            $result->includeParentCategoriesToDepth = $arr["includeParentCategoriesToDepth"];
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
    
    function setIncludeDisabledCategories(bool $includeDisabledCategories)
    {
        $this->includeDisabledCategories = $includeDisabledCategories;
        return $this;
    }
    
    function setIncludeChildCategoriesToDepth(int $includeChildCategoriesToDepth)
    {
        $this->includeChildCategoriesToDepth = $includeChildCategoriesToDepth;
        return $this;
    }
    
    function setIncludeParentCategoriesToDepth(int $includeParentCategoriesToDepth)
    {
        $this->includeParentCategoriesToDepth = $includeParentCategoriesToDepth;
        return $this;
    }
}
