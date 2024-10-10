<?php declare(strict_types=1);

namespace Relewise\Models;

class Campaign extends CampaignEntityStateCampaignMetadataValuesRetailMediaEntity
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Campaign, Relewise.Client";
    public string $name;
    public ?ISchedule $schedule;
    public PromotionCollection $promotions;
    public string $advertiserId;
    public Budget $budget;
    public CampaignStatusWithHistory $status;
    public static function create(?string $id, CampaignEntityState $state, string $name, string $advertiserId, Budget $budget, ?ISchedule $schedule, PromotionCollection $promotions) : Campaign
    {
        $result = new Campaign();
        $result->id = $id;
        $result->state = $state;
        $result->name = $name;
        $result->advertiserId = $advertiserId;
        $result->budget = $budget;
        $result->schedule = $schedule;
        $result->promotions = $promotions;
        return $result;
    }
    
    public static function hydrate(array $arr) : Campaign
    {
        $result = CampaignEntityStateCampaignMetadataValuesRetailMediaEntity::hydrateBase(new Campaign(), $arr);
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("schedule", $arr))
        {
            $result->schedule = ISchedule::hydrate($arr["schedule"]);
        }
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = PromotionCollection::hydrate($arr["promotions"]);
        }
        if (array_key_exists("advertiserId", $arr))
        {
            $result->advertiserId = $arr["advertiserId"];
        }
        if (array_key_exists("budget", $arr))
        {
            $result->budget = Budget::hydrate($arr["budget"]);
        }
        if (array_key_exists("status", $arr))
        {
            $result->status = CampaignStatusWithHistory::hydrate($arr["status"]);
        }
        return $result;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setSchedule(?ISchedule $schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }
    
    function setPromotions(PromotionCollection $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
    
    function setAdvertiserId(string $advertiserId)
    {
        $this->advertiserId = $advertiserId;
        return $this;
    }
    
    function setBudget(Budget $budget)
    {
        $this->budget = $budget;
        return $this;
    }
    
    function setStatus(CampaignStatusWithHistory $status)
    {
        $this->status = $status;
        return $this;
    }
    
    function setState(CampaignEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    function setMetadata(CampaignMetadataValues $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
}
