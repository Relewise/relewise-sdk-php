<?php declare(strict_types=1);

namespace Relewise\Models;

class UserAdministrativeActionRemoveIdentifiers extends UserAdministrativeActionUpdateAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserAdministrativeAction+RemoveIdentifiers, Relewise.Client";
    /** Optional list of identifier keys whose values should be removed from users matching UserConditions. If null removes all identifiers. */
    public ?array $identifierKeys;
    
    public static function create(... $identifierKeys) : UserAdministrativeActionRemoveIdentifiers
    {
        $result = new UserAdministrativeActionRemoveIdentifiers();
        $result->identifierKeys = $identifierKeys;
        return $result;
    }
    
    public static function hydrate(array $arr) : UserAdministrativeActionRemoveIdentifiers
    {
        $result = UserAdministrativeActionUpdateAction::hydrateBase(new UserAdministrativeActionRemoveIdentifiers(), $arr);
        if (array_key_exists("identifierKeys", $arr))
        {
            $result->identifierKeys = array();
            foreach($arr["identifierKeys"] as &$value)
            {
                array_push($result->identifierKeys, $value);
            }
        }
        return $result;
    }
    
    /** Optional list of identifier keys whose values should be removed from users matching UserConditions. If null removes all identifiers. */
    function setIdentifierKeys(string ... $identifierKeys)
    {
        $this->identifierKeys = $identifierKeys;
        return $this;
    }
    
    /**
     * Optional list of identifier keys whose values should be removed from users matching UserConditions. If null removes all identifiers.
     * @param ?string[] $identifierKeys new value.
     */
    function setIdentifierKeysFromArray(array $identifierKeys)
    {
        $this->identifierKeys = $identifierKeys;
        return $this;
    }
    
    /** Optional list of identifier keys whose values should be removed from users matching UserConditions. If null removes all identifiers. */
    function addToIdentifierKeys(string $identifierKeys)
    {
        if (!isset($this->identifierKeys))
        {
            $this->identifierKeys = array();
        }
        array_push($this->identifierKeys, $identifierKeys);
        return $this;
    }
}
