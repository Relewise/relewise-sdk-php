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
    function setContentId(string $contentId)
    {
        $this->contentId = $contentId;
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
    function setAssortmentsFromArray(array $assortments)
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
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    function setCategoryPaths(CategoryPathResultDetails ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function addToCategoryPaths(CategoryPathResultDetails $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
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
    function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
}
