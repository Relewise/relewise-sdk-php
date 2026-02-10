<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class UserCondition
{
    public string $typeDefinition = "";
    /** Whether the UserCondition should have opposite effect. */
    public bool $negated;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.UserConditions.AndCondition, Relewise.Client")
        {
            return AndCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.AuthenticatedIdCondition, Relewise.Client")
        {
            return AuthenticatedIdCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.EmailCondition, Relewise.Client")
        {
            return EmailCondition::hydrate($arr);
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
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasCompanyDataCondition, Relewise.Client")
        {
            return HasCompanyDataCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.HasDataCondition, Relewise.Client")
        {
            return HasDataCondition::hydrate($arr);
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
        if ($type=="Relewise.Client.DataTypes.UserConditions.IdentifierCondition, Relewise.Client")
        {
            return IdentifierCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserConditions.OrCondition, Relewise.Client")
        {
            return OrCondition::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    
    /** Whether the UserCondition should have opposite effect. */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
