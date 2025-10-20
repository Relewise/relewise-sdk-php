<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines what properties are to be included into AbandonedCartTriggerResult response. */
class AbandonedCartTriggerConfigurationPropertySelectionSettings
{
    /** Defines properties to be included into client payload. */
    public ?UserResultDetailsSelectedPropertiesSettings $user;
    
    public static function create() : AbandonedCartTriggerConfigurationPropertySelectionSettings
    {
        $result = new AbandonedCartTriggerConfigurationPropertySelectionSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : AbandonedCartTriggerConfigurationPropertySelectionSettings
    {
        $result = new AbandonedCartTriggerConfigurationPropertySelectionSettings();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserResultDetailsSelectedPropertiesSettings::hydrate($arr["user"]);
        }
        return $result;
    }
    
    /** Defines properties to be included into client payload. */
    function setUser(?UserResultDetailsSelectedPropertiesSettings $user)
    {
        $this->user = $user;
        return $this;
    }
}
