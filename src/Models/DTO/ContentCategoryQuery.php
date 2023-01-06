<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryQuery extends ContentCategoryIdFilterCategoryQuery
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.ContentCategoryQuery, Relewise.Client";
    public static function create(Language $language = Null, Currency $currency = Null) : ContentCategoryQuery
    {
        $result = new ContentCategoryQuery();
        $result->language = $language;
        $result->currency = $currency;
        $result->skipNumberOfResults = 0;
        $result->returnTotalNumberOfResults = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryQuery
    {
        $result = ContentCategoryIdFilterCategoryQuery::hydrateBase(new ContentCategoryQuery(), $arr);
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
