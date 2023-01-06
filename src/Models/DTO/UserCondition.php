<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.UserCondition, Relewise.Client";
    public array $custom;
    public bool $negated;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.UserConditions.AndCondition, Relewise.Client")
        {
            return AndCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasActivityCondition, Relewise.Client")
        {
            return HasActivityCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasAuthenticatedIdCondition, Relewise.Client")
        {
            return HasAuthenticatedIdCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasClassificationCondition, Relewise.Client")
        {
            return HasClassificationCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasEmailCondition, Relewise.Client")
        {
            return HasEmailCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasIdentifierCondition, Relewise.Client")
        {
            return HasIdentifierCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasLineItemsInCartCondition, Relewise.Client")
        {
            return HasLineItemsInCartCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasModifiedCartCondition, Relewise.Client")
        {
            return HasModifiedCartCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasPlacedOrderCondition, Relewise.Client")
        {
            return HasPlacedOrderCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasRecentlyReceivedSameTriggerCondition, Relewise.Client")
        {
            return HasRecentlyReceivedSameTriggerCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasRecentlyReceivedTriggerCondition, Relewise.Client")
        {
            return HasRecentlyReceivedTriggerCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.OrCondition, Relewise.Client")
        {
            return OrCondition::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("custom", $arr))
        {
            $result->custom = array();
            foreach($arr["custom"] as $key => $value)
            {
                $result->custom[$key] = $value;
            }
        }
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
