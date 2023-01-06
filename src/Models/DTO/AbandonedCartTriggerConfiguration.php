<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withCartName(string $cartName)
    {
        $this->cartName = $cartName;
        return $this;
    }
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    function withDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    function withGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }
    function withEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    function withCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function withCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
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
    function withWithinTimeSpanMinutes(int $withinTimeSpanMinutes)
    {
        $this->withinTimeSpanMinutes = $withinTimeSpanMinutes;
        return $this;
    }
    function addSettings(string $key, string $value)
    {
        if (!isset($this->settings))
        {
            $this->settings = array();
        }
        $this->settings[$key] = $value;
        return $this;
    }
    function withUserConditions(UserConditionCollection $userConditions)
    {
        $this->userConditions = $userConditions;
        return $this;
    }
}
