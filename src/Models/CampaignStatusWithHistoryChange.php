<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class CampaignStatusWithHistoryChange implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Campaign+StatusWithHistory+Change, Relewise.Client";
    public DateTime $utcTime;
    
    public CampaignStatusWithHistoryStatusName $status;
    
    public static function create(DateTime $utcTime, CampaignStatusWithHistoryStatusName $status) : CampaignStatusWithHistoryChange
    {
        $result = new CampaignStatusWithHistoryChange();
        $result->utcTime = $utcTime;
        $result->status = $status;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignStatusWithHistoryChange
    {
        $result = new CampaignStatusWithHistoryChange();
        if (array_key_exists("utcTime", $arr))
        {
            $result->utcTime = new DateTime($arr["utcTime"]);
        }
        if (array_key_exists("status", $arr))
        {
            $result->status = CampaignStatusWithHistoryStatusName::from($arr["status"]);
        }
        return $result;
    }
    
    function setUtcTime(DateTime $utcTime)
    {
        $this->utcTime = $utcTime;
        return $this;
    }
    
    function setStatus(CampaignStatusWithHistoryStatusName $status)
    {
        $this->status = $status;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->utcTime))
        {
            $result["utcTime"] = $this->utcTime->format(DATE_ATOM);
        }
        if (isset($this->status))
        {
            $result["status"] = $this->status;
        }
        return $result;
    }
}
