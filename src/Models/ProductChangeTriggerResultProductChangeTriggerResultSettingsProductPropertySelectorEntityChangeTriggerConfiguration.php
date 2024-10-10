<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

abstract class ProductChangeTriggerResultProductChangeTriggerResultSettingsProductPropertySelectorEntityChangeTriggerConfiguration extends ProductChangeTriggerResultTriggerConfiguration implements JsonSerializable
{
    public string $typeDefinition = "";
    
    /** The selector used for choosing which property of the entity the trigger should look for change in. */
    public ?ProductPropertySelector $entityPropertySelector;
    /** The filter that specifies which entities the trigger should track changes for. */
    public FilterCollection $beforeChangeFilters;
    /** The filter for what state the tracked entities should have once they have changed to be included in the results. */
    public FilterCollection $afterChangeFilters;
    /** The type of change that should happen to the value selected by the EntityPropertySelector for an entity to be considered part of the results. */
    public IChange $change;
    /** Settings for defining which properties should be included in the result of the trigger. */
    public ?ProductChangeTriggerResultSettings $resultSettings;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.ProductChangeTriggerConfiguration, Relewise.Client")
        {
            return ProductChangeTriggerConfiguration::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = ProductChangeTriggerResultTriggerConfiguration::hydrateBase($result, $arr);
        if (array_key_exists("entityPropertySelector", $arr))
        {
            $result->entityPropertySelector = ProductPropertySelector::hydrate($arr["entityPropertySelector"]);
        }
        if (array_key_exists("beforeChangeFilters", $arr))
        {
            $result->beforeChangeFilters = FilterCollection::hydrate($arr["beforeChangeFilters"]);
        }
        if (array_key_exists("afterChangeFilters", $arr))
        {
            $result->afterChangeFilters = FilterCollection::hydrate($arr["afterChangeFilters"]);
        }
        if (array_key_exists("change", $arr))
        {
            $result->change = IChange::hydrate($arr["change"]);
        }
        if (array_key_exists("resultSettings", $arr))
        {
            $result->resultSettings = ProductChangeTriggerResultSettings::hydrate($arr["resultSettings"]);
        }
        return $result;
    }
    
    /** The selector used for choosing which property of the entity the trigger should look for change in. */
    function setEntityPropertySelector(?ProductPropertySelector $entityPropertySelector)
    {
        $this->entityPropertySelector = $entityPropertySelector;
        return $this;
    }
    
    /** The filter that specifies which entities the trigger should track changes for. */
    function setBeforeChangeFilters(FilterCollection $beforeChangeFilters)
    {
        $this->beforeChangeFilters = $beforeChangeFilters;
        return $this;
    }
    
    /** The filter for what state the tracked entities should have once they have changed to be included in the results. */
    function setAfterChangeFilters(FilterCollection $afterChangeFilters)
    {
        $this->afterChangeFilters = $afterChangeFilters;
        return $this;
    }
    
    /** The type of change that should happen to the value selected by the EntityPropertySelector for an entity to be considered part of the results. */
    function setChange(IChange $change)
    {
        $this->change = $change;
        return $this;
    }
    
    /** Settings for defining which properties should be included in the result of the trigger. */
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
    
    public function jsonSerialize(): mixed
    {
        $result = array();
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
