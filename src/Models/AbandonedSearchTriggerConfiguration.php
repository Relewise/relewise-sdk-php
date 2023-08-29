<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class AbandonedSearchTriggerConfiguration extends AbandonedSearchTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.AbandonedSearchTriggerConfiguration, Relewise.Client";
    public array $searchTypesInPrioritizedOrder;
    public ?SearchTermCondition $searchTermCondition;
    public bool $suppressOnEntityFromSearchResultViewed;
    public int $considerAbandonedAfterMinutes;
    public static function create(string $name, string $description, array $searchTypesInPrioritizedOrder, ?SearchTermCondition $searchTermCondition = Null, bool $suppressOnEntityFromSearchResultViewed = true) : AbandonedSearchTriggerConfiguration
    {
        $result = new AbandonedSearchTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->searchTypesInPrioritizedOrder = $searchTypesInPrioritizedOrder;
        $result->searchTermCondition = $searchTermCondition;
        $result->suppressOnEntityFromSearchResultViewed = $suppressOnEntityFromSearchResultViewed;
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
        if (array_key_exists("suppressOnEntityFromSearchResultViewed", $arr))
        {
            $result->suppressOnEntityFromSearchResultViewed = $arr["suppressOnEntityFromSearchResultViewed"];
        }
        if (array_key_exists("considerAbandonedAfterMinutes", $arr))
        {
            $result->considerAbandonedAfterMinutes = $arr["considerAbandonedAfterMinutes"];
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
    function setSuppressOnEntityFromSearchResultViewed(bool $suppressOnEntityFromSearchResultViewed)
    {
        $this->suppressOnEntityFromSearchResultViewed = $suppressOnEntityFromSearchResultViewed;
        return $this;
    }
    function setConsiderAbandonedAfterMinutes(int $considerAbandonedAfterMinutes)
    {
        $this->considerAbandonedAfterMinutes = $considerAbandonedAfterMinutes;
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
