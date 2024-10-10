<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class PurchasedByUserCompanyInfo implements JsonSerializable
{
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
        if (isset($this->purchasedByParentCompany))
        {
            $result["purchasedByParentCompany"] = $this->purchasedByParentCompany;
        }
        return $result;
    }
}
