<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryInterestTriggerConfiguration extends ContentCategoryInterestTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.ContentCategoryInterestTriggerConfiguration, Relewise.Client";
    public ?intRange $categoryViews;
    public ?intRange $contentViews;
    public FilterCollection $filters;
    public static function create(string $name, string $description, ?intRange $categoryViews, ?intRange $contentViews, FilterCollection $filters) : ContentCategoryInterestTriggerConfiguration
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
    function withCategoryViews(?intRange $categoryViews)
    {
        $this->categoryViews = $categoryViews;
        return $this;
    }
    function withContentViews(?intRange $contentViews)
    {
        $this->contentViews = $contentViews;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
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
