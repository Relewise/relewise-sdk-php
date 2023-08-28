<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class AbandonedSearchTriggerConfiguration extends AbandonedSearchTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.AbandonedSearchTriggerConfiguration, Relewise.Client";
    public array $searchTypesInPrioritizedOrder;
    public ?SearchTermCondition $searchTermCondition;
    public static function create(string $name, string $description, array $searchTypesInPrioritizedOrder, ?SearchTermCondition $searchTermCondition = Null) : AbandonedSearchTriggerConfiguration
    {
        $result = new AbandonedSearchTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->searchTypesInPrioritizedOrder = $searchTypesInPrioritizedOrder;
        $result->searchTermCondition = $searchTermCondition;
        return $result;
    }
    public static function hydrate(array $arr) : AbandonedSearchTriggerConfiguration
    {
        $result = AbandonedSearchTriggerResultTriggerConfiguration::hydrateBase(new AbandonedSearchTriggerConfiguration(), $arr);
        if (array_key_exists("searchTypesInPrioritizedOrder", $arr))
        {
            $result->searchTypesInPrioritizedOrder = array();
            foreach($arr["searchTypesInPrioritizedOrder"] as &$value)
            {
                array_push($result->searchTypesInPrioritizedOrder, SearchType::from($value));
            }
        }
        if (array_key_exists("searchTermCondition", $arr))
        {
            $result->searchTermCondition = SearchTermCondition::hydrate($arr["searchTermCondition"]);
        }
        return $result;
    }
    function setSearchTypesInPrioritizedOrder(SearchType ... $searchTypesInPrioritizedOrder)
    {
        $this->searchTypesInPrioritizedOrder = $searchTypesInPrioritizedOrder;
        return $this;
    }
    /** @param SearchType[] $searchTypesInPrioritizedOrder new value. */
    function setSearchTypesInPrioritizedOrderFromArray(array $searchTypesInPrioritizedOrder)
    {
        $this->searchTypesInPrioritizedOrder = $searchTypesInPrioritizedOrder;
        return $this;
    }
    function addToSearchTypesInPrioritizedOrder(SearchType $searchTypesInPrioritizedOrder)
    {
        if (!isset($this->searchTypesInPrioritizedOrder))
        {
            $this->searchTypesInPrioritizedOrder = array();
        }
        array_push($this->searchTypesInPrioritizedOrder, $searchTypesInPrioritizedOrder);
        return $this;
    }
    function setSearchTermCondition(?SearchTermCondition $searchTermCondition)
    {
        $this->searchTermCondition = $searchTermCondition;
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
