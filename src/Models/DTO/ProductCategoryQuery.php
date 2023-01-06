<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryQuery extends ProductCategoryIdFilterCategoryQuery
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ProductCategoryQuery, Relewise.Client";
    public static function create() : ProductCategoryQuery
    {
        $result = new ProductCategoryQuery();
        $result->skipNumberOfResults = 0;
        $result->returnTotalNumberOfResults = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryQuery
    {
        $result = ProductCategoryIdFilterCategoryQuery::hydrateBase(new ProductCategoryQuery(), $arr);
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
    function withIncludeDisabledCategories(bool $includeDisabledCategories)
    {
        $this->includeDisabledCategories = $includeDisabledCategories;
        return $this;
    }
    function withIncludeChildCategoriesToDepth(int $includeChildCategoriesToDepth)
    {
        $this->includeChildCategoriesToDepth = $includeChildCategoriesToDepth;
        return $this;
    }
    function withIncludeParentCategoriesToDepth(int $includeParentCategoriesToDepth)
    {
        $this->includeParentCategoriesToDepth = $includeParentCategoriesToDepth;
        return $this;
    }
}
