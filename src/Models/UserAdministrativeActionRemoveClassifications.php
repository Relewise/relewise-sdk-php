<?php declare(strict_types=1);

namespace Relewise\Models;

class UserAdministrativeActionRemoveClassifications extends UserAdministrativeActionUpdateAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserAdministrativeAction+RemoveClassifications, Relewise.Client";
    /** Optional list of classification keys to remove from users matching UserConditions. If null removes all classifications. */
    public ?array $classificationKeys;
    
    public static function create(... $classificationKeys) : UserAdministrativeActionRemoveClassifications
    {
        $result = new UserAdministrativeActionRemoveClassifications();
        $result->classificationKeys = $classificationKeys;
        return $result;
    }
    
    public static function hydrate(array $arr) : UserAdministrativeActionRemoveClassifications
    {
        $result = UserAdministrativeActionUpdateAction::hydrateBase(new UserAdministrativeActionRemoveClassifications(), $arr);
        if (array_key_exists("classificationKeys", $arr))
        {
            $result->classificationKeys = array();
            foreach($arr["classificationKeys"] as &$value)
            {
                array_push($result->classificationKeys, $value);
            }
        }
        return $result;
    }
    
    /** Optional list of classification keys to remove from users matching UserConditions. If null removes all classifications. */
    function setClassificationKeys(string ... $classificationKeys)
    {
        $this->classificationKeys = $classificationKeys;
        return $this;
    }
    
    /**
     * Optional list of classification keys to remove from users matching UserConditions. If null removes all classifications.
     * @param ?string[] $classificationKeys new value.
     */
    function setClassificationKeysFromArray(array $classificationKeys)
    {
        $this->classificationKeys = $classificationKeys;
        return $this;
    }
    
    /** Optional list of classification keys to remove from users matching UserConditions. If null removes all classifications. */
    function addToClassificationKeys(string $classificationKeys)
    {
        if (!isset($this->classificationKeys))
        {
            $this->classificationKeys = array();
        }
        array_push($this->classificationKeys, $classificationKeys);
        return $this;
    }
}
