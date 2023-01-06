<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryInterestTriggerResultCategory
{
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
    function withLastPath(string ... $lastPath)
    {
        $this->lastPath = $lastPath;
        return $this;
    }
    function withViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
    function withViewedContents(ContentResultDetails ... $viewedContents)
    {
        $this->viewedContents = $viewedContents;
        return $this;
    }
}
