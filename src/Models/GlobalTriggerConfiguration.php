<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class GlobalTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.GlobalTriggerConfiguration, Relewise.Client";
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
    /**
     * Sets modified to a new value.
     * @param DateTime $modified new value.
     */
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    /**
     * Sets enabled to a new value.
     * @param bool $enabled new value.
     */
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * Sets minimumCooldownAnyTrigger to a new value.
     * @param ?int $minimumCooldownAnyTrigger new value.
     */
    function setMinimumCooldownAnyTrigger(?int $minimumCooldownAnyTrigger)
    {
        $this->minimumCooldownAnyTrigger = $minimumCooldownAnyTrigger;
        return $this;
    }
    /**
     * Sets minimumCooldownSameTrigger to a new value.
     * @param ?int $minimumCooldownSameTrigger new value.
     */
    function setMinimumCooldownSameTrigger(?int $minimumCooldownSameTrigger)
    {
        $this->minimumCooldownSameTrigger = $minimumCooldownSameTrigger;
        return $this;
    }
    /**
     * Sets minimumCooldownSameGroup to a new value.
     * @param ?int $minimumCooldownSameGroup new value.
     */
    function setMinimumCooldownSameGroup(?int $minimumCooldownSameGroup)
    {
        $this->minimumCooldownSameGroup = $minimumCooldownSameGroup;
        return $this;
    }
    /**
     * Sets the value of a specific key in settings.
     * @param string $key index.
     * @param string $value new value.
     */
    function addToSettings(string $key, string $value)
    {
        if (!isset($this->settings))
        {
            $this->settings = array();
        }
        $this->settings[$key] = $value;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param array<string, string> $settings associative array.
     */
    function setSettingsFromAssociativeArray(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
