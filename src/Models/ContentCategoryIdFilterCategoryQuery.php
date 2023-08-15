<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ContentCategoryIdFilterCategoryQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.CategoryQuery`1[[Relewise.Client.Requests.Filters.ContentCategoryIdFilter, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
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
        if ($type=="Relewise.Client.Requests.Queries.ContentCategoryQuery, Relewise.Client")
        {
            return ContentCategoryQuery::hydrate($arr);
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
