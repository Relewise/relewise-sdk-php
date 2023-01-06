<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductInterestTriggerConfiguration extends ProductInterestTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.ProductInterestTriggerConfiguration, Relewise.Client";
    public ?intRange $productViews;
    public FilterCollection $filters;
    public ProductInterestTriggerResultResultSettings $resultSettings;
    public static function create(string $name, string $description, ?intRange $productViews, FilterCollection $filters) : ProductInterestTriggerConfiguration
    {
        $result = new ProductInterestTriggerConfiguration();
        $result->name = $name;
        $result->description = $description;
        $result->productViews = $productViews;
        $result->filters = $filters;
        return $result;
    }
    public static function hydrate(array $arr) : ProductInterestTriggerConfiguration
    {
        $result = ProductInterestTriggerResultTriggerConfiguration::hydrateBase(new ProductInterestTriggerConfiguration(), $arr);
        if (array_key_exists("productViews", $arr))
        {
            $result->productViews = intRange::hydrate($arr["productViews"]);
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("resultSettings", $arr))
        {
            $result->resultSettings = ProductInterestTriggerResultResultSettings::hydrate($arr["resultSettings"]);
        }
        return $result;
    }
    function withProductViews(?intRange $productViews)
    {
        $this->productViews = $productViews;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withResultSettings(ProductInterestTriggerResultResultSettings $resultSettings)
    {
        $this->resultSettings = $resultSettings;
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
