<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentResultDetails, Relewise.Client";
    public string $contentId;
    public Multilingual $displayName;
    public array $assortments;
    public array $data;
    public array $categoryPaths;
    public ViewedByUserInfo $viewedByUser;
    public DateTime $createdUtc;
    public ?DateTime $lastViewedUtc;
    public int $viewedTotalNumberOfTimes;
    public int $viewedByDifferentNumberOfUsers;
    public bool $disabled;
    public bool $deleted;
    public static function create(string $contentId) : ContentResultDetails
    {
        $result = new ContentResultDetails();
        $result->contentId = $contentId;
        return $result;
    }
    public static function hydrate(array $arr) : ContentResultDetails
    {
        $result = new ContentResultDetails();
        if (array_key_exists("contentId", $arr))
        {
            $result->contentId = $arr["contentId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
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
                array_push($result->categoryPaths, CategoryPathResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("viewedByUser", $arr))
        {
            $result->viewedByUser = ViewedByUserInfo::hydrate($arr["viewedByUser"]);
        }
        if (array_key_exists("createdUtc", $arr))
        {
            $result->createdUtc = new DateTime($arr["createdUtc"]);
        }
        if (array_key_exists("lastViewedUtc", $arr))
        {
            $result->lastViewedUtc = new DateTime($arr["lastViewedUtc"]);
        }
        if (array_key_exists("viewedTotalNumberOfTimes", $arr))
        {
            $result->viewedTotalNumberOfTimes = $arr["viewedTotalNumberOfTimes"];
        }
        if (array_key_exists("viewedByDifferentNumberOfUsers", $arr))
        {
            $result->viewedByDifferentNumberOfUsers = $arr["viewedByDifferentNumberOfUsers"];
        }
        if (array_key_exists("disabled", $arr))
        {
            $result->disabled = $arr["disabled"];
        }
        if (array_key_exists("deleted", $arr))
        {
            $result->deleted = $arr["deleted"];
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
     * Sets categoryPaths to a new value.
     * @param CategoryPathResultDetails[] $categoryPaths new value.
     */
    function setCategoryPaths(CategoryPathResultDetails ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value from an array.
     * @param CategoryPathResultDetails[] $categoryPaths new value.
     */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Adds a new element to categoryPaths.
     * @param CategoryPathResultDetails $categoryPaths new element.
     */
    function addToCategoryPaths(CategoryPathResultDetails $categoryPaths)
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
     * Sets deleted to a new value.
     * @param bool $deleted new value.
     */
    function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
}
