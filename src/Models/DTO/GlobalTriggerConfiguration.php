<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class GlobalTriggerConfiguration
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
            $result->modified = $arr["modified"];
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
    function withModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    function withMinimumCooldownAnyTrigger(?int $minimumCooldownAnyTrigger)
    {
        $this->minimumCooldownAnyTrigger = $minimumCooldownAnyTrigger;
        return $this;
    }
    function withMinimumCooldownSameTrigger(?int $minimumCooldownSameTrigger)
    {
        $this->minimumCooldownSameTrigger = $minimumCooldownSameTrigger;
        return $this;
    }
    function withMinimumCooldownSameGroup(?int $minimumCooldownSameGroup)
    {
        $this->minimumCooldownSameGroup = $minimumCooldownSameGroup;
        return $this;
    }
    function withSettings(string $key, string $value)
    {
        if (!isset($this->settings))
        {
            $this->settings = array();
        }
        $this->settings[$key] = $value;
        return $this;
    }
}
