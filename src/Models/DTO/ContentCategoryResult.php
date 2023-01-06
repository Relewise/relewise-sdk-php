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
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    function setPaths(CategoryPathResult ... $paths)
    {
        $this->paths = $paths;
        return $this;
    }
    function addToPaths(CategoryPathResult $paths)
    {
        if (!isset($this->paths))
        {
            $this->paths = array();
        }
        array_push($this->paths, $paths);
        return $this;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
}
