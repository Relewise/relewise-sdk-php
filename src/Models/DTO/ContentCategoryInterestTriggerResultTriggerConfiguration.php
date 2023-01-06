<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class ContentCategoryInterestTriggerResultTriggerConfiguration extends TriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.TriggerConfiguration`1[[Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult, Relewise.Client, Version=1.56.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.ContentCategoryInterestTriggerConfiguration, Relewise.Client")
        {
            return ContentCategoryInterestTriggerConfiguration::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TriggerConfiguration::hydrateBase($result, $arr);
        return $result;
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
