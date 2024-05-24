<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PurchasedByUserCompanyInfo
{
    public string $typeDefinition = "Relewise.Client.DataTypes.PurchasedByUserCompanyInfo, Relewise.Client";
    public DateTime $mostRecentPurchasedUtc;
    public int $totalNumberOfTimesPurchased;
    public PurchasedByUserCompanyInfo $purchasedByParentCompany;
    public static function create(DateTime $mostRecentPurchasedUtc, int $totalNumberOfTimesPurchased) : PurchasedByUserCompanyInfo
    {
        $result = new PurchasedByUserCompanyInfo();
        $result->mostRecentPurchasedUtc = $mostRecentPurchasedUtc;
        $result->totalNumberOfTimesPurchased = $totalNumberOfTimesPurchased;
        return $result;
    }
    public static function hydrate(array $arr) : PurchasedByUserCompanyInfo
    {
        $result = new PurchasedByUserCompanyInfo();
        if (array_key_exists("mostRecentPurchasedUtc", $arr))
        {
            $result->mostRecentPurchasedUtc = new DateTime($arr["mostRecentPurchasedUtc"]);
        }
        if (array_key_exists("totalNumberOfTimesPurchased", $arr))
        {
            $result->totalNumberOfTimesPurchased = $arr["totalNumberOfTimesPurchased"];
        }
        if (array_key_exists("purchasedByParentCompany", $arr))
        {
            $result->purchasedByParentCompany = PurchasedByUserCompanyInfo::hydrate($arr["purchasedByParentCompany"]);
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
    function setPurchasedByParentCompany(PurchasedByUserCompanyInfo $purchasedByParentCompany)
    {
        $this->purchasedByParentCompany = $purchasedByParentCompany;
        return $this;
    }
}
