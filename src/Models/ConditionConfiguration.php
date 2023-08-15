<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ConditionConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Configurations.ConditionConfiguration, Relewise.Client";
    public UserConditionConfiguration $user;
    public InputConditionConfiguration $input;
    public TargetConditionConfiguration $target;
    public ContextConditionConfiguration $context;
    public static function create() : ConditionConfiguration
    {
        $result = new ConditionConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : ConditionConfiguration
    {
        $result = new ConditionConfiguration();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserConditionConfiguration::hydrate($arr["user"]);
        }
        if (array_key_exists("input", $arr))
        {
            $result->input = InputConditionConfiguration::hydrate($arr["input"]);
        }
        if (array_key_exists("target", $arr))
        {
            $result->target = TargetConditionConfiguration::hydrate($arr["target"]);
        }
        if (array_key_exists("context", $arr))
        {
            $result->context = ContextConditionConfiguration::hydrate($arr["context"]);
        }
        return $result;
    }
    /**
     * Sets user to a new value.
     * @param UserConditionConfiguration $user new value.
     */
    function setUser(UserConditionConfiguration $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets input to a new value.
     * @param InputConditionConfiguration $input new value.
     */
    function setInput(InputConditionConfiguration $input)
    {
        $this->input = $input;
        return $this;
    }
    /**
     * Sets target to a new value.
     * @param TargetConditionConfiguration $target new value.
     */
    function setTarget(TargetConditionConfiguration $target)
    {
        $this->target = $target;
        return $this;
    }
    /**
     * Sets context to a new value.
     * @param ContextConditionConfiguration $context new value.
     */
    function setContext(ContextConditionConfiguration $context)
    {
        $this->context = $context;
        return $this;
    }
}
