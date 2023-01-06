<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
            $result->mostRecentlyViewedUtc = $arr["mostRecentlyViewedUtc"];
        }
        if (array_key_exists("totalNumberOfTimesViewed", $arr))
        {
            $result->totalNumberOfTimesViewed = $arr["totalNumberOfTimesViewed"];
        }
        return $result;
    }
    function withMostRecentlyViewedUtc(DateTime $mostRecentlyViewedUtc)
    {
        $this->mostRecentlyViewedUtc = $mostRecentlyViewedUtc;
        return $this;
    }
    function withTotalNumberOfTimesViewed(int $totalNumberOfTimesViewed)
    {
        $this->totalNumberOfTimesViewed = $totalNumberOfTimesViewed;
        return $this;
    }
}