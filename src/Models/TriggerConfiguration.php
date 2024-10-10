<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

abstract class TriggerConfiguration implements JsonSerializable
{
    public string $typeDefinition = "";
    public string $id;
    public string $name;
    public string $description;
    public string $group;
    public bool $enabled;
    public DateTime $created;
    public string $createdBy;
    public DateTime $modified;
    public string $modifiedBy;
    public int $withinTimeSpanMinutes;
    public array $settings;
    public UserConditionCollection $userConditions;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.AbandonedCartTriggerConfiguration, Relewise.Client")
        {
            return AbandonedCartTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.AbandonedSearchTriggerConfiguration, Relewise.Client")
        {
            return AbandonedSearchTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.ContentCategoryInterestTriggerConfiguration, Relewise.Client")
        {
            return ContentCategoryInterestTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.ProductCategoryInterestTriggerConfiguration, Relewise.Client")
        {
            return ProductCategoryInterestTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.ProductChangeTriggerConfiguration, Relewise.Client")
        {
            return ProductChangeTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.ProductInterestTriggerConfiguration, Relewise.Client")
        {
            return ProductInterestTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.UserActivityTriggerConfiguration, Relewise.Client")
        {
            return UserActivityTriggerConfiguration::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Triggers.Configurations.VariantChangeTriggerConfiguration, Relewise.Client")
        {
            return VariantChangeTriggerConfiguration::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("description", $arr))
        {
            $result->description = $arr["description"];
        }
        if (array_key_exists("group", $arr))
        {
            $result->group = $arr["group"];
        }
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("created", $arr))
        {
            $result->created = new DateTime($arr["created"]);
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = new DateTime($arr["modified"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("withinTimeSpanMinutes", $arr))
        {
            $result->withinTimeSpanMinutes = $arr["withinTimeSpanMinutes"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = array();
            foreach($arr["settings"] as $key => $value)
            {
                $result->settings[$key] = $value;
            }
        }
        if (array_key_exists("userConditions", $arr))
        {
            $result->userConditions = UserConditionCollection::hydrate($arr["userConditions"]);
        }
        return $result;
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
