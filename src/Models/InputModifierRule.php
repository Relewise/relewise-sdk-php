<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class InputModifierRule extends MerchandisingRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Rules.InputModifierRule, Relewise.Client";
    public static function create(string $name, string $description) : InputModifierRule
    {
        $result = new InputModifierRule();
        $result->name = $name;
        $result->description = $description;
        return $result;
    }
    public static function hydrate(array $arr) : InputModifierRule
    {
        $result = MerchandisingRule::hydrateBase(new InputModifierRule(), $arr);
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
