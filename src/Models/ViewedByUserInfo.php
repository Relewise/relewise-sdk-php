<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ViewedByUserInfo
{
    public DateTime $mostRecentlyViewedUtc;
    public int $totalNumberOfTimesViewed;
    public static function create(DateTime $mostRecentlyViewedUtc, int $totalNumberOfTimesViewed) : ViewedByUserInfo
    {
        $result = new ViewedByUserInfo();
        $result->mostRecentlyViewedUtc = $mostRecentlyViewedUtc;
        $result->totalNumberOfTimesViewed = $totalNumberOfTimesViewed;
        return $result;
    }
    public static function hydrate(array $arr) : ViewedByUserInfo
    {
        $result = new ViewedByUserInfo();
        if (array_key_exists("mostRecentlyViewedUtc", $arr))
        {
            $result->mostRecentlyViewedUtc = new DateTime($arr["mostRecentlyViewedUtc"]);
        }
        if (array_key_exists("totalNumberOfTimesViewed", $arr))
        {
            $result->totalNumberOfTimesViewed = $arr["totalNumberOfTimesViewed"];
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
}
