<?php declare(strict_types=1);

namespace Relewise\Models;

class UserAdministrativeActionDeleteUser extends UserAdministrativeActionUpdateAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserAdministrativeAction+DeleteUser, Relewise.Client";
    public static function create() : UserAdministrativeActionDeleteUser
    {
        $result = new UserAdministrativeActionDeleteUser();
        return $result;
    }
    
    public static function hydrate(array $arr) : UserAdministrativeActionDeleteUser
    {
        $result = UserAdministrativeActionUpdateAction::hydrateBase(new UserAdministrativeActionDeleteUser(), $arr);
        return $result;
    }
}
