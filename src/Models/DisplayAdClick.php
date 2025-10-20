<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdClick extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.DisplayAdClick, Relewise.Client";
    public ?User $user;
    public string $displayAdId;
    public string $campaignId;
    
    public static function create(?User $user, string $displayAdId, string $campaignId) : DisplayAdClick
    {
        $result = new DisplayAdClick();
        $result->user = $user;
        $result->displayAdId = $displayAdId;
        $result->campaignId = $campaignId;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdClick
    {
        $result = Trackable::hydrateBase(new DisplayAdClick(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("displayAdId", $arr))
        {
            $result->displayAdId = $arr["displayAdId"];
        }
        if (array_key_exists("campaignId", $arr))
        {
            $result->campaignId = $arr["campaignId"];
        }
        return $result;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setDisplayAdId(string $displayAdId)
    {
        $this->displayAdId = $displayAdId;
        return $this;
    }
    
    function setCampaignId(string $campaignId)
    {
        $this->campaignId = $campaignId;
        return $this;
    }
}
