<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaResultPlacementResultEntityDisplayAd
{
    public DisplayAdResult $result;
    public string $campaignId;
    
    public static function create() : RetailMediaResultPlacementResultEntityDisplayAd
    {
        $result = new RetailMediaResultPlacementResultEntityDisplayAd();
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaResultPlacementResultEntityDisplayAd
    {
        $result = new RetailMediaResultPlacementResultEntityDisplayAd();
        if (array_key_exists("result", $arr))
        {
            $result->result = DisplayAdResult::hydrate($arr["result"]);
        }
        if (array_key_exists("campaignId", $arr))
        {
            $result->campaignId = $arr["campaignId"];
        }
        return $result;
    }
    
    function setResult(DisplayAdResult $result)
    {
        $this->result = $result;
        return $this;
    }
    
    function setCampaignId(string $campaignId)
    {
        $this->campaignId = $campaignId;
        return $this;
    }
}
