<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets categoryId to a new value.
     * @param string $categoryId new value.
     */
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    /**
     * Sets displayName to a new value.
     * @param Multilingual $displayName new value.
     */
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Sets assortments to a new value.
     * @param int[] $assortments new value.
     */
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Adds a new element to assortments.
     * @param int $assortments new element.
     */
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    /**
     * Sets the value of a specific key in data.
     * @param string $key index.
     * @param DataValue $value new value.
     */
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /**
     * Sets data to a new value.
     * @param array<string, DataValue> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * Sets viewedByUser to a new value.
     * @param ViewedByUserInfo $viewedByUser new value.
     */
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    /**
     * Sets createdUtc to a new value.
     * @param DateTime $createdUtc new value.
     */
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    /**
     * Sets lastViewedUtc to a new value.
     * @param ?DateTime $lastViewedUtc new value.
     */
    function setLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    /**
     * Sets viewedTotalNumberOfTimes to a new value.
     * @param int $viewedTotalNumberOfTimes new value.
     */
    function setViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    /**
     * Sets viewedByDifferentNumberOfUsers to a new value.
     * @param int $viewedByDifferentNumberOfUsers new value.
     */
    function setViewedByDifferentNumberOfUsers(int $viewedByDifferentNumberOfUsers)
    {
        $this->viewedByDifferentNumberOfUsers = $viewedByDifferentNumberOfUsers;
        return $this;
    }
    /**
     * Sets disabled to a new value.
     * @param bool $disabled new value.
     */
    function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
    /**
     * Sets childCategories to a new value.
     * @param ContentCategoryResultDetails[] $childCategories new value.
     */
    function setChildCategories(ContentCategoryResultDetails ... $childCategories)
    {
        $this->childCategories = $childCategories;
        return $this;
    }
    /**
     * Sets childCategories to a new value from an array.
     * @param ContentCategoryResultDetails[] $childCategories new value.
     */
    function setChildCategoriesFromArray(array $childCategories)
    {
        $this->childCategories = $childCategories;
        return $this;
    }
    /**
     * Adds a new element to childCategories.
     * @param ContentCategoryResultDetails $childCategories new element.
     */
    function addToChildCategories(ContentCategoryResultDetails $childCategories)
    {
        if (!isset($this->childCategories))
        {
            $this->childCategories = array();
        }
        array_push($this->childCategories, $childCategories);
        return $this;
    }
    /**
     * Sets parentCategories to a new value.
     * @param ContentCategoryResultDetails[] $parentCategories new value.
     */
    function setParentCategories(ContentCategoryResultDetails ... $parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }
    /**
     * Sets parentCategories to a new value from an array.
     * @param ContentCategoryResultDetails[] $parentCategories new value.
     */
    function setParentCategoriesFromArray(array $parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }
    /**
     * Adds a new element to parentCategories.
     * @param ContentCategoryResultDetails $parentCategories new element.
     */
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
