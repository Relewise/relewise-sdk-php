<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ViewedByUserInfo
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ViewedByUserInfo, Relewise.Client";
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
    /**
     * Sets mostRecentlyViewedUtc to a new value.
     * @param DateTime $mostRecentlyViewedUtc new value.
     */
    function setMostRecentlyViewedUtc(DateTime $mostRecentlyViewedUtc)
    {
        $this->mostRecentlyViewedUtc = $mostRecentlyViewedUtc;
        return $this;
    }
    /**
     * Sets totalNumberOfTimesViewed to a new value.
     * @param int $totalNumberOfTimesViewed new value.
     */
    function setTotalNumberOfTimesViewed(int $totalNumberOfTimesViewed)
    {
        $this->totalNumberOfTimesViewed = $totalNumberOfTimesViewed;
        return $this;
    }
}
