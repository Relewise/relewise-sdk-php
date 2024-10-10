<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignStatusWithHistory
{
    public CampaignStatusWithHistoryStatusName $current;
    public array $history;
    public static function create(CampaignStatusWithHistoryStatusName $current, CampaignStatusWithHistoryChange ... $history) : CampaignStatusWithHistory
    {
        $result = new CampaignStatusWithHistory();
        $result->current = $current;
        $result->history = $history;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignStatusWithHistory
    {
        $result = new CampaignStatusWithHistory();
        if (array_key_exists("current", $arr))
        {
            $result->current = CampaignStatusWithHistoryStatusName::from($arr["current"]);
        }
        if (array_key_exists("history", $arr))
        {
            $result->history = array();
            foreach($arr["history"] as &$value)
            {
                array_push($result->history, $value);
            }
        }
        return $result;
    }
    
    function setCurrent(CampaignStatusWithHistoryStatusName $current)
    {
        $this->current = $current;
        return $this;
    }
    
    function setHistory(CampaignStatusWithHistoryChange ... $history)
    {
        $this->history = $history;
        return $this;
    }
    
    /** @param CampaignStatusWithHistoryChange[] $history new value. */
    function setHistoryFromArray(array $history)
    {
        $this->history = $history;
        return $this;
    }
    
    function addToHistory(CampaignStatusWithHistoryChange $history)
    {
        if (!isset($this->history))
        {
            $this->history = array();
        }
        array_push($this->history, $history);
        return $this;
    }
}
