<?php declare(strict_types=1);

namespace Relewise\Models;

class UserAdministrativeAction extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserAdministrativeAction, Relewise.Client";
    public UserConditionCollection $userConditions;
    public UserAdministrativeActionUpdateAction $userUpdateAction;
    
    public static function create(UserConditionCollection $userConditions, UserAdministrativeActionUpdateAction $userUpdateAction) : UserAdministrativeAction
    {
        $result = new UserAdministrativeAction();
        $result->userConditions = $userConditions;
        $result->userUpdateAction = $userUpdateAction;
        return $result;
    }
    
    public static function hydrate(array $arr) : UserAdministrativeAction
    {
        $result = Trackable::hydrateBase(new UserAdministrativeAction(), $arr);
        if (array_key_exists("userConditions", $arr))
        {
            $result->userConditions = UserConditionCollection::hydrate($arr["userConditions"]);
        }
        if (array_key_exists("userUpdateAction", $arr))
        {
            $result->userUpdateAction = UserAdministrativeActionUpdateAction::hydrate($arr["userUpdateAction"]);
        }
        return $result;
    }
    
    function setUserConditions(UserConditionCollection $userConditions)
    {
        $this->userConditions = $userConditions;
        return $this;
    }
    
    function setUserUpdateAction(UserAdministrativeActionUpdateAction $userUpdateAction)
    {
        $this->userUpdateAction = $userUpdateAction;
        return $this;
    }
}
