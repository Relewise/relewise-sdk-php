<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveCampaignsRequest extends CampaignSaveEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.SaveCampaignsRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveCampaignsRequest
    {
        $result = new SaveCampaignsRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveCampaignsRequest
    {
        $result = CampaignSaveEntitiesRequest::hydrateBase(new SaveCampaignsRequest(), $arr);
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
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
