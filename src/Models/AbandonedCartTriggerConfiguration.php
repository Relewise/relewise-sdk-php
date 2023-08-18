<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class AbandonedCartTriggerConfiguration extends AbandonedCartTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.AbandonedCartTriggerConfiguration, Relewise.Client";
    public string $cartName;
    public static function create(string $name, string $description, string $cartName = Null) : AbandonedCartTriggerConfiguration
    {
        $result = new AbandonedCartTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->cartName = $cartName;
        return $result;
    }
    public static function hydrate(array $arr) : AbandonedCartTriggerConfiguration
    {
        $result = AbandonedCartTriggerResultTriggerConfiguration::hydrateBase(new AbandonedCartTriggerConfiguration(), $arr);
        if (array_key_exists("cartName", $arr))
        {
            $result->cartName = $arr["cartName"];
        }
        return $result;
    }
    function setCartName(string $cartName)
    {
        $this->cartName = $cartName;
        return $this;
    }
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
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
    function setWithinTimeSpanMinutes(int $withinTimeSpanMinutes)
    {
        $this->withinTimeSpanMinutes = $withinTimeSpanMinutes;
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
    /**
     * Sets settings to a new value.
     * @param array<string, string> $settings associative array.
     */
    function setSettingsFromAssociativeArray(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function setUserConditions(UserConditionCollection $userConditions)
    {
        $this->userConditions = $userConditions;
        return $this;
    }
}
