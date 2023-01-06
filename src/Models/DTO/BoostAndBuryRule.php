<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withMultiplierSelector(ValueSelector $multiplierSelector)
    {
        $this->multiplierSelector = $multiplierSelector;
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
    function withConditions(ConditionConfiguration $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function withRequest(RequestConfiguration $request)
    {
        $this->request = $request;
        return $this;
    }
    function withPriority(float $priority)
    {
        $this->priority = $priority;
        return $this;
    }
    function withSettings(string $key, string $value)
    {
        if (!isset($this->settings))
        {
            $this->settings = array();
        }
        $this->settings[$key] = $value;
        return $this;
    }
}
