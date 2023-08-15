<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryQuery extends ProductCategoryIdFilterCategoryQuery
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ProductCategoryQuery, Relewise.Client";
    public static function create(?Language $language = Null, ?Currency $currency = Null) : ProductCategoryQuery
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
     * Sets includeDisabledCategories to a new value.
     * @param bool $includeDisabledCategories new value.
     */
    function setIncludeDisabledCategories(bool $includeDisabledCategories)
    {
        $this->includeDisabledCategories = $includeDisabledCategories;
        return $this;
    }
    /**
     * Sets includeChildCategoriesToDepth to a new value.
     * @param int $includeChildCategoriesToDepth new value.
     */
    function setIncludeChildCategoriesToDepth(int $includeChildCategoriesToDepth)
    {
        $this->includeChildCategoriesToDepth = $includeChildCategoriesToDepth;
        return $this;
    }
    /**
     * Sets includeParentCategoriesToDepth to a new value.
     * @param int $includeParentCategoriesToDepth new value.
     */
    function setIncludeParentCategoriesToDepth(int $includeParentCategoriesToDepth)
    {
        $this->includeParentCategoriesToDepth = $includeParentCategoriesToDepth;
        return $this;
    }
}
