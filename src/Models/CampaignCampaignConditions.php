<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignCampaignConditions extends RetailMediaConditions
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Campaign+CampaignConditions, Relewise.Client";
    public ?SearchTermConditionByLanguageCollection $searchTerm;
    
    public static function create() : CampaignCampaignConditions
    {
        $result = new CampaignCampaignConditions();
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignCampaignConditions
    {
        $result = RetailMediaConditions::hydrateBase(new CampaignCampaignConditions(), $arr);
        if (array_key_exists("searchTerm", $arr))
        {
            $result->searchTerm = SearchTermConditionByLanguageCollection::hydrate($arr["searchTerm"]);
        }
        return $result;
    }
    
    function setSearchTerm(?SearchTermConditionByLanguageCollection $searchTerm)
    {
        $this->searchTerm = $searchTerm;
        return $this;
    }
}
