<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class MerchandisingRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Rules.MerchandisingRule, Relewise.Client";
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
     * Sets conditions to a new value.
     * @param ConditionConfiguration $conditions new value.
     */
    function setConditions(ConditionConfiguration $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Sets request to a new value.
     * @param RequestConfiguration $request new value.
     */
    function setRequest(RequestConfiguration $request)
    {
        $this->request = $request;
        return $this;
    }
    /**
     * Sets priority to a new value.
     * @param float $priority new value.
     */
    function setPriority(float $priority)
    {
        $this->priority = $priority;
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
}
