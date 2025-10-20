<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ContentResultDetails implements JsonSerializable
{
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
    /** Contains engagement signals (sentiment and favorite state) recorded for the current user on this content item. Populated only when the request sets UserEngagement to true. */
    public ?ContentEngagementData $userEngagement;
    
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
        if (array_key_exists("userEngagement", $arr))
        {
            $result->userEngagement = ContentEngagementData::hydrate($arr["userEngagement"]);
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
    
    /** @param int[] $assortments new value. */
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
    
    /** @param array<string, DataValue> $data associative array. */
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
    
    /** @param CategoryPathResultDetails[] $categoryPaths new value. */
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
    
    /** Contains engagement signals (sentiment and favorite state) recorded for the current user on this content item. Populated only when the request sets UserEngagement to true. */
    function setUserEngagement(?ContentEngagementData $userEngagement)
    {
        $this->userEngagement = $userEngagement;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->contentId))
        {
            $result["contentId"] = $this->contentId;
        }
        if (isset($this->displayName))
        {
            $result["displayName"] = $this->displayName;
        }
        if (isset($this->assortments))
        {
            $result["assortments"] = $this->assortments;
        }
        if (isset($this->data))
        {
            $result["data"] = $this->data;
        }
        if (isset($this->categoryPaths))
        {
            $result["categoryPaths"] = $this->categoryPaths;
        }
        if (isset($this->viewedByUser))
        {
            $result["viewedByUser"] = $this->viewedByUser;
        }
        if (isset($this->createdUtc))
        {
            $result["createdUtc"] = $this->createdUtc->format(DATE_ATOM);
        }
        if (isset($this->lastViewedUtc))
        {
            $result["lastViewedUtc"] = $this->lastViewedUtc->format(DATE_ATOM);
        }
        if (isset($this->viewedTotalNumberOfTimes))
        {
            $result["viewedTotalNumberOfTimes"] = $this->viewedTotalNumberOfTimes;
        }
        if (isset($this->viewedByDifferentNumberOfUsers))
        {
            $result["viewedByDifferentNumberOfUsers"] = $this->viewedByDifferentNumberOfUsers;
        }
        if (isset($this->disabled))
        {
            $result["disabled"] = $this->disabled;
        }
        if (isset($this->deleted))
        {
            $result["deleted"] = $this->deleted;
        }
        if (isset($this->userEngagement))
        {
            $result["userEngagement"] = $this->userEngagement;
        }
        return $result;
    }
}
