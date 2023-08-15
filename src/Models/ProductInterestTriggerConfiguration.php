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
    /**
     * Sets productViews to a new value.
     * @param ?intRange $productViews new value.
     */
    function setProductViews(?intRange $productViews)
    {
        $this->productViews = $productViews;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets resultSettings to a new value.
     * @param ProductInterestTriggerResultResultSettings $resultSettings new value.
     */
    function setResultSettings(ProductInterestTriggerResultResultSettings $resultSettings)
    {
        $this->resultSettings = $resultSettings;
        return $this;
    }
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets name to a new value.
     * @param string $name new value.
     */
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Sets description to a new value.
     * @param string $description new value.
     */
    function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Sets group to a new value.
     * @param string $group new value.
     */
    function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }
    /**
     * Sets enabled to a new value.
     * @param bool $enabled new value.
     */
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * Sets created to a new value.
     * @param DateTime $created new value.
     */
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    /**
     * Sets createdBy to a new value.
     * @param string $createdBy new value.
     */
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * Sets modified to a new value.
     * @param DateTime $modified new value.
     */
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    /**
     * Sets withinTimeSpanMinutes to a new value.
     * @param int $withinTimeSpanMinutes new value.
     */
    function setWithinTimeSpanMinutes(int $withinTimeSpanMinutes)
    {
        $this->withinTimeSpanMinutes = $withinTimeSpanMinutes;
        return $this;
    }
    /**
     * Sets the value of a specific key in settings.
     * @param string $key index.
     * @param string $value new value.
     */
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
    /**
     * Sets userConditions to a new value.
     * @param UserConditionCollection $userConditions new value.
     */
    function setUserConditions(UserConditionCollection $userConditions)
    {
        $this->userConditions = $userConditions;
        return $this;
    }
}
