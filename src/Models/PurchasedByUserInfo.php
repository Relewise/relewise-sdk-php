<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PurchasedByUserInfo
{
    public string $typeDefinition = "Relewise.Client.DataTypes.PurchasedByUserInfo, Relewise.Client";
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
    /**
     * Sets mostRecentPurchasedUtc to a new value.
     * @param DateTime $mostRecentPurchasedUtc new value.
     */
    function setMostRecentPurchasedUtc(DateTime $mostRecentPurchasedUtc)
    {
        $this->mostRecentPurchasedUtc = $mostRecentPurchasedUtc;
        return $this;
    }
    /**
     * Sets totalNumberOfTimesPurchased to a new value.
     * @param int $totalNumberOfTimesPurchased new value.
     */
    function setTotalNumberOfTimesPurchased(int $totalNumberOfTimesPurchased)
    {
        $this->totalNumberOfTimesPurchased = $totalNumberOfTimesPurchased;
        return $this;
    }
}
