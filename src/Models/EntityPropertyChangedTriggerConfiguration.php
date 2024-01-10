<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class EntityPropertyChangedTriggerConfiguration extends EntityPropertyChangedTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.EntityPropertyChangedTriggerConfiguration, Relewise.Client";
    /** The type of entity that the trigger should look for changes in. */
    public EntityType $entityType;
    /** The selector used for choosing which property of the entity the trigger should look for change in. */
    public IEntityPropertySelector $entityPropertySelector;
    /** The filter that specifies which entities the trigger should track changes for. */
    public Filter $beforeChangeFilter;
    /** The filter for what state the tracked products should have once they have changed to be included in the results. */
    public Filter $afterChangeFilter;
    /** The type of change that should happen to the value selected by the EntityPropertySelector for an entity to be considered part of the results. */
    public ChangeType $changeType;
    public static function create(string $name, string $description, EntityType $entityType, IEntityPropertySelector $entityPropertySelector, Filter $beforeChangeFilter, Filter $afterChangeFilter, ChangeType $changeType) : EntityPropertyChangedTriggerConfiguration
    {
        $result = new EntityPropertyChangedTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->entityType = $entityType;
        $result->entityPropertySelector = $entityPropertySelector;
        $result->beforeChangeFilter = $beforeChangeFilter;
        $result->afterChangeFilter = $afterChangeFilter;
        $result->changeType = $changeType;
        return $result;
    }
    public static function hydrate(array $arr) : EntityPropertyChangedTriggerConfiguration
    {
        $result = EntityPropertyChangedTriggerResultTriggerConfiguration::hydrateBase(new EntityPropertyChangedTriggerConfiguration(), $arr);
        if (array_key_exists("entityType", $arr))
        {
            $result->entityType = EntityType::from($arr["entityType"]);
        }
        if (array_key_exists("entityPropertySelector", $arr))
        {
            $result->entityPropertySelector = IEntityPropertySelector::hydrate($arr["entityPropertySelector"]);
        }
        if (array_key_exists("beforeChangeFilter", $arr))
        {
            $result->beforeChangeFilter = Filter::hydrate($arr["beforeChangeFilter"]);
        }
        if (array_key_exists("afterChangeFilter", $arr))
        {
            $result->afterChangeFilter = Filter::hydrate($arr["afterChangeFilter"]);
        }
        if (array_key_exists("changeType", $arr))
        {
            $result->changeType = ChangeType::from($arr["changeType"]);
        }
        return $result;
    }
    /** The type of entity that the trigger should look for changes in. */
    function setEntityType(EntityType $entityType)
    {
        $this->entityType = $entityType;
        return $this;
    }
    /** The selector used for choosing which property of the entity the trigger should look for change in. */
    function setEntityPropertySelector(IEntityPropertySelector $entityPropertySelector)
    {
        $this->entityPropertySelector = $entityPropertySelector;
        return $this;
    }
    /** The filter that specifies which entities the trigger should track changes for. */
    function setBeforeChangeFilter(Filter $beforeChangeFilter)
    {
        $this->beforeChangeFilter = $beforeChangeFilter;
        return $this;
    }
    /** The filter for what state the tracked products should have once they have changed to be included in the results. */
    function setAfterChangeFilter(Filter $afterChangeFilter)
    {
        $this->afterChangeFilter = $afterChangeFilter;
        return $this;
    }
    /** The type of change that should happen to the value selected by the EntityPropertySelector for an entity to be considered part of the results. */
    function setChangeType(ChangeType $changeType)
    {
        $this->changeType = $changeType;
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
