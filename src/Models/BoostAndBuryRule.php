<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class BoostAndBuryRule extends MerchandisingRule implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Rules.BoostAndBuryRule, Relewise.Client";
    public ValueSelector $multiplierSelector;
    
    public static function create(string $name, string $description, ValueSelector $multiplierSelector) : BoostAndBuryRule
    {
        $result = new BoostAndBuryRule();
        $result->name = $name;
        $result->description = $description;
        $result->multiplierSelector = $multiplierSelector;
        return $result;
    }
    
    public static function hydrate(array $arr) : BoostAndBuryRule
    {
        $result = MerchandisingRule::hydrateBase(new BoostAndBuryRule(), $arr);
        if (array_key_exists("multiplierSelector", $arr))
        {
            $result->multiplierSelector = ValueSelector::hydrate($arr["multiplierSelector"]);
        }
        return $result;
    }
    
    function setMultiplierSelector(ValueSelector $multiplierSelector)
    {
        $this->multiplierSelector = $multiplierSelector;
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
    
    function setSchedule(?ISchedule $schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }
    
    function setStatus(?MerchandisingRuleStatusName $status)
    {
        $this->status = $status;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->multiplierSelector))
        {
            $result["multiplierSelector"] = $this->multiplierSelector;
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
        if (isset($this->schedule))
        {
            $result["schedule"] = $this->schedule;
        }
        if (isset($this->status))
        {
            $result["status"] = $this->status;
        }
        return $result;
    }
}
