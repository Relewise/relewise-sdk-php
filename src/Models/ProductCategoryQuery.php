<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryQuery extends ProductCategoryIdFilterCategoryQuery
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ProductCategoryQuery, Relewise.Client";
    public static function create(Language $language = Null, Currency $currency = Null) : ProductCategoryQuery
    {
        $result = new ProductCategoryQuery();
        $result->language = $language;
        $result->currency = $currency;
        $result->skipNumberOfResults = 0;
        $result->returnTotalNumberOfResults = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryQuery
    {
        $result = ProductCategoryIdFilterCategoryQuery::hydrateBase(new ProductCategoryQuery(), $arr);
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
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setCurrency(Currency $currency)
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
