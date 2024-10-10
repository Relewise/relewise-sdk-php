<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class GlobalTriggerConfiguration implements JsonSerializable
{
    public DateTime $modified;
    public string $modifiedBy;
    public bool $enabled;
    public ?int $minimumCooldownAnyTrigger;
    public ?int $minimumCooldownSameTrigger;
    public ?int $minimumCooldownSameGroup;
    public array $settings;
    public static function create() : GlobalTriggerConfiguration
    {
        $result = new GlobalTriggerConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : GlobalTriggerConfiguration
    {
        $result = new GlobalTriggerConfiguration();
        if (array_key_exists("modified", $arr))
        {
            $result->modified = new DateTime($arr["modified"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("minimumCooldownAnyTrigger", $arr))
        {
            $result->minimumCooldownAnyTrigger = $arr["minimumCooldownAnyTrigger"];
        }
        if (array_key_exists("minimumCooldownSameTrigger", $arr))
        {
            $result->minimumCooldownSameTrigger = $arr["minimumCooldownSameTrigger"];
        }
        if (array_key_exists("minimumCooldownSameGroup", $arr))
        {
            $result->minimumCooldownSameGroup = $arr["minimumCooldownSameGroup"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = array();
            foreach($arr["settings"] as $key => $value)
            {
                $result->settings[$key] = $value;
            }
        }
        return $result;
    }
    
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    function setMinimumCooldownAnyTrigger(?int $minimumCooldownAnyTrigger)
    {
        $this->minimumCooldownAnyTrigger = $minimumCooldownAnyTrigger;
        return $this;
    }
    
    function setMinimumCooldownSameTrigger(?int $minimumCooldownSameTrigger)
    {
        $this->minimumCooldownSameTrigger = $minimumCooldownSameTrigger;
        return $this;
    }
    
    function setMinimumCooldownSameGroup(?int $minimumCooldownSameGroup)
    {
        $this->minimumCooldownSameGroup = $minimumCooldownSameGroup;
        return $this;
    }
    
    function addToSettings(string $key, string $value)
    {
        if (!isset($this->settings))
        {
            $this->settings = array();
        }
        $this->settings[$key] = $value;
        return $this;
    }
    
    /** @param array<string, string> $settings associative array. */
    function setSettingsFromAssociativeArray(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->modified))
        {
            $result["modified"] = $this->modified->format(DATE_ATOM);
        }
        if (isset($this->modifiedBy))
        {
            $result["modifiedBy"] = $this->modifiedBy;
        }
        if (isset($this->enabled))
        {
            $result["enabled"] = $this->enabled;
        }
        if (isset($this->minimumCooldownAnyTrigger))
        {
            $result["minimumCooldownAnyTrigger"] = $this->minimumCooldownAnyTrigger;
        }
        if (isset($this->minimumCooldownSameTrigger))
        {
            $result["minimumCooldownSameTrigger"] = $this->minimumCooldownSameTrigger;
        }
        if (isset($this->minimumCooldownSameGroup))
        {
            $result["minimumCooldownSameGroup"] = $this->minimumCooldownSameGroup;
        }
        if (isset($this->settings))
        {
            $result["settings"] = $this->settings;
        }
        return $result;
    }
}
