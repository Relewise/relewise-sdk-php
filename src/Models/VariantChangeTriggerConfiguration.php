<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class VariantChangeTriggerConfiguration extends VariantChangeTriggerResultVariantChangeTriggerResultSettingsVariantPropertySelectorEntityChangeTriggerConfiguration implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.VariantChangeTriggerConfiguration, Relewise.Client";
    public static function create(string $name, string $description, VariantPropertySelector $entityPropertySelector, IChange $change, VariantChangeTriggerResultSettings $resultSettings) : VariantChangeTriggerConfiguration
    {
        $result = new VariantChangeTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->entityPropertySelector = $entityPropertySelector;
        $result->change = $change;
        $result->resultSettings = $resultSettings;
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantChangeTriggerConfiguration
    {
        $result = VariantChangeTriggerResultVariantChangeTriggerResultSettingsVariantPropertySelectorEntityChangeTriggerConfiguration::hydrateBase(new VariantChangeTriggerConfiguration(), $arr);
        return $result;
    }
    
    function setEntityPropertySelector(?VariantPropertySelector $entityPropertySelector)
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
    
    function setResultSettings(?VariantChangeTriggerResultSettings $resultSettings)
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
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->entityPropertySelector))
        {
            $result["entityPropertySelector"] = $this->entityPropertySelector;
        }
        if (isset($this->beforeChangeFilters))
        {
            $result["beforeChangeFilters"] = $this->beforeChangeFilters;
        }
        if (isset($this->afterChangeFilters))
        {
            $result["afterChangeFilters"] = $this->afterChangeFilters;
        }
        if (isset($this->change))
        {
            $result["change"] = $this->change;
        }
        if (isset($this->resultSettings))
        {
            $result["resultSettings"] = $this->resultSettings;
        }
        if (isset($this->id))
        {
            $result["id"] = $this->id;
        }
        if (isset($this->name))
        {
            $result["name"] = $this->name;
        }
        if (isset($this->description))
        {
            $result["description"] = $this->description;
        }
        if (isset($this->group))
        {
            $result["group"] = $this->group;
        }
        if (isset($this->enabled))
        {
            $result["enabled"] = $this->enabled;
        }
        if (isset($this->created))
        {
            $result["created"] = $this->created->format(DATE_ATOM);
        }
        if (isset($this->createdBy))
        {
            $result["createdBy"] = $this->createdBy;
        }
        if (isset($this->modified))
        {
            $result["modified"] = $this->modified->format(DATE_ATOM);
        }
        if (isset($this->modifiedBy))
        {
            $result["modifiedBy"] = $this->modifiedBy;
        }
        if (isset($this->withinTimeSpanMinutes))
        {
            $result["withinTimeSpanMinutes"] = $this->withinTimeSpanMinutes;
        }
        if (isset($this->settings))
        {
            $result["settings"] = $this->settings;
        }
        if (isset($this->userConditions))
        {
            $result["userConditions"] = $this->userConditions;
        }
        return $result;
    }
}
