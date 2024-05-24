<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductChangeTriggerConfiguration extends EntityChangeTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.ProductChangeTriggerConfiguration, Relewise.Client";
    public static function create(string $name, string $description, ProductPropertySelector $entityPropertySelector, IChange $change, ProductChangeTriggerResultSettings $resultSettings) : ProductChangeTriggerConfiguration
    {
        $result = new ProductChangeTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->entityPropertySelector = $entityPropertySelector;
        $result->change = $change;
        $result->resultSettings = $resultSettings;
        return $result;
    }
    public static function hydrate(array $arr) : ProductChangeTriggerConfiguration
    {
        $result = EntityChangeTriggerConfiguration::hydrateBase(new ProductChangeTriggerConfiguration(), $arr);
        return $result;
    }
    function setEntityPropertySelector(?ProductPropertySelector $entityPropertySelector)
    {
        $this->entityPropertySelector = $entityPropertySelector;
        return $this;
    }
    function setBeforeChangeFilters(FilterCollection $beforeChangeFilters)
    {
        $this->beforeChangeFilters = $beforeChangeFilters;
        return $this;
    }
    function setAfterChangeFilters(FilterCollection $afterChangeFilters)
    {
        $this->afterChangeFilters = $afterChangeFilters;
        return $this;
    }
    function setChange(IChange $change)
    {
        $this->change = $change;
        return $this;
    }
    function setResultSettings(?ProductChangeTriggerResultSettings $resultSettings)
    {
        $this->resultSettings = $resultSettings;
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
    /** @param array<string, string> $settings associative array. */
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
