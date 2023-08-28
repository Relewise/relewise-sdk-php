<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryInterestTriggerResultCategory
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult+Category, Relewise.Client";
    public array $lastPath;
    public int $views;
    public array $viewedContents;
    public static function create() : ContentCategoryInterestTriggerResultCategory
    {
        $result = new ContentCategoryInterestTriggerResultCategory();
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryInterestTriggerResultCategory
    {
        $result = new ContentCategoryInterestTriggerResultCategory();
        if (array_key_exists("lastPath", $arr))
        {
            $result->lastPath = array();
            foreach($arr["lastPath"] as &$value)
            {
                array_push($result->lastPath, $value);
            }
        }
        if (array_key_exists("views", $arr))
        {
            $result->views = $arr["views"];
        }
        if (array_key_exists("viewedContents", $arr))
        {
            $result->viewedContents = array();
            foreach($arr["viewedContents"] as &$value)
            {
                array_push($result->viewedContents, ContentResultDetails::hydrate($value));
            }
        }
        return $result;
    }
    function setLastPath(string ... $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    /** @param string[] $lastPath new value. */
    function setLastPathFromArray(array $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    function addToLastPath(string $lastPath)
    {
        if (!isset($this->lastPath))
        {
            $this->lastPath = array();
        }
        array_push($this->lastPath, $lastPath);
        return $this;
    }
    function setViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
    function setViewedContents(ContentResultDetails ... $viewedContents)
    {
        $this->viewedContents = $viewedContents;
        return $this;
    }
    /** @param ContentResultDetails[] $viewedContents new value. */
    function setViewedContentsFromArray(array $viewedContents)
    {
        $this->viewedContents = $viewedContents;
        return $this;
    }
    function addToViewedContents(ContentResultDetails $viewedContents)
    {
        if (!isset($this->viewedContents))
        {
            $this->viewedContents = array();
        }
        array_push($this->viewedContents, $viewedContents);
        return $this;
    }
}
