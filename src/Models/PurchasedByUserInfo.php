<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class PurchasedByUserInfo implements JsonSerializable
{
    public DateTime $mostRecentPurchasedUtc;
    public int $totalNumberOfTimesPurchased;
    public static function create(DateTime $mostRecentPurchasedUtc, int $totalNumberOfTimesPurchased) : PurchasedByUserInfo
    {
        $result = new PurchasedByUserInfo();
        $result->mostRecentPurchasedUtc = $mostRecentPurchasedUtc;
        $result->totalNumberOfTimesPurchased = $totalNumberOfTimesPurchased;
        return $result;
    }
    
    public static function hydrate(array $arr) : PurchasedByUserInfo
    {
        $result = new PurchasedByUserInfo();
        if (array_key_exists("mostRecentPurchasedUtc", $arr))
        {
            $result->mostRecentPurchasedUtc = new DateTime($arr["mostRecentPurchasedUtc"]);
        }
        if (array_key_exists("totalNumberOfTimesPurchased", $arr))
        {
            $result->totalNumberOfTimesPurchased = $arr["totalNumberOfTimesPurchased"];
        }
        return $result;
    }
    
    function setMostRecentPurchasedUtc(DateTime $mostRecentPurchasedUtc)
    {
        $this->mostRecentPurchasedUtc = $mostRecentPurchasedUtc;
        return $this;
    }
    
    function setTotalNumberOfTimesPurchased(int $totalNumberOfTimesPurchased)
    {
        $this->totalNumberOfTimesPurchased = $totalNumberOfTimesPurchased;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->mostRecentPurchasedUtc))
        {
            $result["mostRecentPurchasedUtc"] = $this->mostRecentPurchasedUtc->format(DATE_ATOM);
        }
        if (isset($this->totalNumberOfTimesPurchased))
        {
            $result["totalNumberOfTimesPurchased"] = $this->totalNumberOfTimesPurchased;
        }
        return $result;
    }
}
