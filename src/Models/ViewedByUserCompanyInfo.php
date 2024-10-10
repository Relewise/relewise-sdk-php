<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ViewedByUserCompanyInfo implements JsonSerializable
{
    public DateTime $mostRecentlyViewedUtc;
    public int $totalNumberOfTimesViewed;
    public ViewedByUserCompanyInfo $viewedByParentCompany;
    public static function create(DateTime $mostRecentlyViewedUtc, int $totalNumberOfTimesViewed) : ViewedByUserCompanyInfo
    {
        $result = new ViewedByUserCompanyInfo();
        $result->mostRecentlyViewedUtc = $mostRecentlyViewedUtc;
        $result->totalNumberOfTimesViewed = $totalNumberOfTimesViewed;
        return $result;
    }
    public static function hydrate(array $arr) : ViewedByUserCompanyInfo
    {
        $result = new ViewedByUserCompanyInfo();
        if (array_key_exists("mostRecentlyViewedUtc", $arr))
        {
            $result->mostRecentlyViewedUtc = new DateTime($arr["mostRecentlyViewedUtc"]);
        }
        if (array_key_exists("totalNumberOfTimesViewed", $arr))
        {
            $result->totalNumberOfTimesViewed = $arr["totalNumberOfTimesViewed"];
        }
        if (array_key_exists("viewedByParentCompany", $arr))
        {
            $result->viewedByParentCompany = ViewedByUserCompanyInfo::hydrate($arr["viewedByParentCompany"]);
        }
        return $result;
    }
    
    function setMostRecentlyViewedUtc(DateTime $mostRecentlyViewedUtc)
    {
        $this->mostRecentlyViewedUtc = $mostRecentlyViewedUtc;
        return $this;
    }
    
    function setTotalNumberOfTimesViewed(int $totalNumberOfTimesViewed)
    {
        $this->totalNumberOfTimesViewed = $totalNumberOfTimesViewed;
        return $this;
    }
    
    function setViewedByParentCompany(ViewedByUserCompanyInfo $viewedByParentCompany)
    {
        $this->viewedByParentCompany = $viewedByParentCompany;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->mostRecentlyViewedUtc))
        {
            $result["mostRecentlyViewedUtc"] = $this->mostRecentlyViewedUtc->format(DATE_ATOM);
        }
        if (isset($this->totalNumberOfTimesViewed))
        {
            $result["totalNumberOfTimesViewed"] = $this->totalNumberOfTimesViewed;
        }
        if (isset($this->viewedByParentCompany))
        {
            $result["viewedByParentCompany"] = $this->viewedByParentCompany;
        }
        return $result;
    }
}
