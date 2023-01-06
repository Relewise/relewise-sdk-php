<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryResult extends CategoryResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentCategoryResult, Relewise.Client";
    public static function create() : ContentCategoryResult
    {
        $result = new ContentCategoryResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryResult
    {
        $result = CategoryResult::hydrateBase(new ContentCategoryResult(), $arr);
        return $result;
    }
    function withCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function withDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function withViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    function withPaths(CategoryPathResult ... $paths)
    {
        $this->paths = $paths;
        return $this;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
