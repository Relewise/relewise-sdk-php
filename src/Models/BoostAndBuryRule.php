<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BoostAndBuryRule extends MerchandisingRule
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
}
