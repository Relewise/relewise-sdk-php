<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

abstract class MerchandisingRule implements JsonSerializable
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
    
    public ConditionConfiguration $conditions;
    
    public RequestConfiguration $request;
    
    public float $priority;
    
    public array $settings;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Merchandising.Rules.BoostAndBuryRule, Relewise.Client")
        {
            return BoostAndBuryRule::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Merchandising.Rules.FilterRule, Relewise.Client")
        {
            return FilterRule::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Merchandising.Rules.FixedPositionRule, Relewise.Client")
        {
            return FixedPositionRule::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Merchandising.Rules.InputModifierRule, Relewise.Client")
        {
            return InputModifierRule::hydrate($arr);
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
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ConditionConfiguration::hydrate($arr["conditions"]);
        }
        if (array_key_exists("request", $arr))
        {
            $result->request = RequestConfiguration::hydrate($arr["request"]);
        }
        if (array_key_exists("priority", $arr))
        {
            $result->priority = $arr["priority"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = array();
            foreach($arr["settings"] as $key => $value)
            {
                $result->settings[$key] = $value;
            }
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
    
    function setConditions(ConditionConfiguration $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    function setRequest(RequestConfiguration $request)
    {
        $this->request = $request;
        return $this;
    }
    
    function setPriority(float $priority)
    {
        $this->priority = $priority;
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
        if (isset($this->conditions))
        {
            $result["conditions"] = $this->conditions;
        }
        if (isset($this->request))
        {
            $result["request"] = $this->request;
        }
        if (isset($this->priority))
        {
            $result["priority"] = $this->priority;
        }
        if (isset($this->settings))
        {
            $result["settings"] = $this->settings;
        }
        return $result;
    }
}
