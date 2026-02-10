<?php declare(strict_types=1);

namespace Relewise\Models;

class AuthenticatedIdCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.AuthenticatedIdCondition, Relewise.Client";
    public array $authenticatedIds;
    
    public static function create(array $authenticatedIds, bool $negated = false) : AuthenticatedIdCondition
    {
        $result = new AuthenticatedIdCondition();
        $result->authenticatedIds = $authenticatedIds;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : AuthenticatedIdCondition
    {
        $result = UserCondition::hydrateBase(new AuthenticatedIdCondition(), $arr);
        if (array_key_exists("authenticatedIds", $arr))
        {
            $result->authenticatedIds = array();
            foreach($arr["authenticatedIds"] as &$value)
            {
                array_push($result->authenticatedIds, $value);
            }
        }
        return $result;
    }
    
    function setAuthenticatedIds(string ... $authenticatedIds)
    {
        $this->authenticatedIds = $authenticatedIds;
        return $this;
    }
    
    /** @param string[] $authenticatedIds new value. */
    function setAuthenticatedIdsFromArray(array $authenticatedIds)
    {
        $this->authenticatedIds = $authenticatedIds;
        return $this;
    }
    
    function addToAuthenticatedIds(string $authenticatedIds)
    {
        if (!isset($this->authenticatedIds))
        {
            $this->authenticatedIds = array();
        }
        array_push($this->authenticatedIds, $authenticatedIds);
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
