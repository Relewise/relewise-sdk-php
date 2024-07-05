<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveCampaignsResponse extends CampaignSaveEntitiesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.SaveCampaignsResponse, Relewise.Client";
    public static function create() : SaveCampaignsResponse
    {
        $result = new SaveCampaignsResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SaveCampaignsResponse
    {
        $result = CampaignSaveEntitiesResponse::hydrateBase(new SaveCampaignsResponse(), $arr);
        return $result;
    }
    function setEntities(Campaign ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    /** @param Campaign[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    function addToEntities(Campaign $entities)
    {
        if (!isset($this->entities))
        {
            $this->entities = array();
        }
        array_push($this->entities, $entities);
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
