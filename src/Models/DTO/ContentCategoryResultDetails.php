<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryResultDetails extends ContentCategoryResultDetailsCategoryResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentCategoryResultDetails, Relewise.Client";
    public static function create(string $categoryId) : ContentCategoryResultDetails
    {
        $result = new ContentCategoryResultDetails();
        $result->categoryId = $categoryId;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryResultDetails
    {
        $result = ContentCategoryResultDetailsCategoryResultDetails::hydrateBase(new ContentCategoryResultDetails(), $arr);
        return $result;
    }
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
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
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    function setLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    function setViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    function setViewedByDifferentNumberOfUsers(int $viewedByDifferentNumberOfUsers)
    {
        $this->viewedByDifferentNumberOfUsers = $viewedByDifferentNumberOfUsers;
        return $this;
    }
    function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
    function setChildCategories(ContentCategoryResultDetails ... $childCategories)
    {
        $this->childCategories = $childCategories;
        return $this;
    }
    function addToChildCategories(ContentCategoryResultDetails $childCategories)
    {
        if (!isset($this->childCategories))
        {
            $this->childCategories = array();
        }
        array_push($this->childCategories, $childCategories);
        return $this;
    }
    function setParentCategories(ContentCategoryResultDetails ... $parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }
    function addToParentCategories(ContentCategoryResultDetails $parentCategories)
    {
        if (!isset($this->parentCategories))
        {
            $this->parentCategories = array();
        }
        array_push($this->parentCategories, $parentCategories);
        return $this;
    }
}
