<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryInterestTriggerConfiguration extends ProductCategoryInterestTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.ProductCategoryInterestTriggerConfiguration, Relewise.Client";
    public ?intRange $categoryViews;
    public ?intRange $productViews;
    public FilterCollection $filters;
    public static function create(string $name, string $description, ?intRange $categoryViews, ?intRange $productViews, FilterCollection $filters = Null) : ProductCategoryInterestTriggerConfiguration
    {
        $result = new ProductCategoryInterestTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->categoryViews = $categoryViews;
        $result->productViews = $productViews;
        $result->filters = $filters;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryInterestTriggerConfiguration
    {
        $result = ProductCategoryInterestTriggerResultTriggerConfiguration::hydrateBase(new ProductCategoryInterestTriggerConfiguration(), $arr);
        if (array_key_exists("categoryViews", $arr))
        {
            $result->categoryViews = intRange::hydrate($arr["categoryViews"]);
        }
        if (array_key_exists("productViews", $arr))
        {
            $result->productViews = intRange::hydrate($arr["productViews"]);
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
    function setProductViews(?intRange $productViews)
    {
        $this->productViews = $productViews;
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
    /**
     * Sets settings to a new value.
     * @param array<string, string> $settings associative array.
     */
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
