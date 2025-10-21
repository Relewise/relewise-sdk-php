<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ClickedByUserInfo implements JsonSerializable
{
    public DateTime $mostRecentlyClickedUtc;
    public int $totalNumberOfTimesClicked;
    
    public static function create(DateTime $mostRecentlyClickedUtc, int $totalNumberOfTimesClicked) : ClickedByUserInfo
    {
        $result = new ClickedByUserInfo();
        $result->mostRecentlyClickedUtc = $mostRecentlyClickedUtc;
        $result->totalNumberOfTimesClicked = $totalNumberOfTimesClicked;
        return $result;
    }
    
    public static function hydrate(array $arr) : ClickedByUserInfo
    {
        $result = new ClickedByUserInfo();
        if (array_key_exists("mostRecentlyClickedUtc", $arr))
        {
            $result->mostRecentlyClickedUtc = new DateTime($arr["mostRecentlyClickedUtc"]);
        }
        if (array_key_exists("totalNumberOfTimesClicked", $arr))
        {
            $result->totalNumberOfTimesClicked = $arr["totalNumberOfTimesClicked"];
        }
        return $result;
    }
    
    function setMostRecentlyClickedUtc(DateTime $mostRecentlyClickedUtc)
    {
        $this->mostRecentlyClickedUtc = $mostRecentlyClickedUtc;
        return $this;
    }
    
    function setTotalNumberOfTimesClicked(int $totalNumberOfTimesClicked)
    {
        $this->totalNumberOfTimesClicked = $totalNumberOfTimesClicked;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->mostRecentlyClickedUtc))
        {
            $result["mostRecentlyClickedUtc"] = $this->mostRecentlyClickedUtc->format(DATE_ATOM);
        }
        if (isset($this->totalNumberOfTimesClicked))
        {
            $result["totalNumberOfTimesClicked"] = $this->totalNumberOfTimesClicked;
        }
        return $result;
    }
}
