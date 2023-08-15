<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ContentCategoryInterestTriggerResultTriggerConfiguration extends TriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.TriggerConfiguration`1[[Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
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
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets name to a new value.
     * @param string $name new value.
     */
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Sets description to a new value.
     * @param string $description new value.
     */
    function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Sets group to a new value.
     * @param string $group new value.
     */
    function setGroup(string $group)
    {
        $this->group = $group;
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
     * Sets created to a new value.
     * @param DateTime $created new value.
     */
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    /**
     * Sets createdBy to a new value.
     * @param string $createdBy new value.
     */
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
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
     * Sets withinTimeSpanMinutes to a new value.
     * @param int $withinTimeSpanMinutes new value.
     */
    function setWithinTimeSpanMinutes(int $withinTimeSpanMinutes)
    {
        $this->withinTimeSpanMinutes = $withinTimeSpanMinutes;
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
    /**
     * Sets userConditions to a new value.
     * @param UserConditionCollection $userConditions new value.
     */
    function setUserConditions(UserConditionCollection $userConditions)
    {
        $this->userConditions = $userConditions;
        return $this;
    }
}
