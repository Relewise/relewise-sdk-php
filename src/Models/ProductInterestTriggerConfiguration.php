<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductInterestTriggerConfiguration extends ProductInterestTriggerResultTriggerConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Triggers.Configurations.ProductInterestTriggerConfiguration, Relewise.Client";
    public ?intRange $productViews;
    public FilterCollection $filters;
    public ProductInterestTriggerResultResultSettings $resultSettings;
    public static function create(string $name, string $description, ?intRange $productViews, FilterCollection $filters = Null) : ProductInterestTriggerConfiguration
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
    function setResultSettings(ProductInterestTriggerResultResultSettings $resultSettings)
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
    function setUserConditions(UserConditionCollection $userConditions)
    {
        $this->userConditions = $userConditions;
        return $this;
    }
}
