<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ContentCategoryInterestTriggerConfiguration extends ContentCategoryInterestTriggerResultTriggerConfiguration implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.ContentCategoryInterestTriggerConfiguration, Relewise.Client";
    
    public ?intRange $categoryViews;
    
    public ?intRange $contentViews;
    
    public FilterCollection $filters;
    
    public static function create(string $name, string $description, ?intRange $categoryViews, ?intRange $contentViews, FilterCollection $filters = Null) : ContentCategoryInterestTriggerConfiguration
    {
        $result = new ContentCategoryInterestTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->categoryViews = $categoryViews;
        $result->contentViews = $contentViews;
        $result->filters = $filters;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategoryInterestTriggerConfiguration
    {
        $result = ContentCategoryInterestTriggerResultTriggerConfiguration::hydrateBase(new ContentCategoryInterestTriggerConfiguration(), $arr);
        if (array_key_exists("categoryViews", $arr))
        {
            $result->categoryViews = intRange::hydrate($arr["categoryViews"]);
        }
        if (array_key_exists("contentViews", $arr))
        {
            $result->contentViews = intRange::hydrate($arr["contentViews"]);
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        return $result;
    }
    
    function setCategoryViews(?intRange $categoryViews)
    {
        $this->categoryViews = $categoryViews;
        return $this;
    }
    
    function setContentViews(?intRange $contentViews)
    {
        $this->contentViews = $contentViews;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
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
        if (isset($this->categoryViews))
        {
            $result["categoryViews"] = $this->categoryViews;
        }
        if (isset($this->contentViews))
        {
            $result["contentViews"] = $this->contentViews;
        }
        if (isset($this->filters))
        {
            $result["filters"] = $this->filters;
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
