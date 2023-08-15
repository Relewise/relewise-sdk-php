<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentResult, Relewise.Client";
    public string $contentId;
    public string $displayName;
    public int $rank;
    public array $assortments;
    public array $data;
    public array $categoryPaths;
    public ViewedByUserInfo $viewedByUser;
    public static function create(string $contentId, int $rank) : ContentResult
    {
        $result = new ContentResult();
        $result->contentId = $contentId;
        $result->rank = $rank;
        return $result;
    }
    public static function hydrate(array $arr) : ContentResult
    {
        $result = new ContentResult();
        if (array_key_exists("contentId", $arr))
        {
            $result->contentId = $arr["contentId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = $arr["rank"];
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = array();
            foreach($arr["categoryPaths"] as &$value)
            {
                array_push($result->categoryPaths, CategoryPathResult::hydrate($value));
            }
        }
        if (array_key_exists("viewedByUser", $arr))
        {
            $result->viewedByUser = ViewedByUserInfo::hydrate($arr["viewedByUser"]);
        }
        return $result;
    }
    /**
     * Sets contentId to a new value.
     * @param string $contentId new value.
     */
    function setContentId(string $contentId)
    {
        $this->contentId = $contentId;
        return $this;
    }
    /**
     * Sets displayName to a new value.
     * @param string $displayName new value.
     */
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Sets rank to a new value.
     * @param int $rank new value.
     */
    function setRank(int $rank)
    {
        $this->rank = $rank;
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
     * Sets categoryPaths to a new value.
     * @param CategoryPathResult[] $categoryPaths new value.
     */
    function setCategoryPaths(CategoryPathResult ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value from an array.
     * @param CategoryPathResult[] $categoryPaths new value.
     */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Adds a new element to categoryPaths.
     * @param CategoryPathResult $categoryPaths new element.
     */
    function addToCategoryPaths(CategoryPathResult $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
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
}
