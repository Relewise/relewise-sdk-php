<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class UserAdministrativeActionUpdateAction
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.UserAdministrativeAction+DeleteUser, Relewise.Client")
        {
            return UserAdministrativeActionDeleteUser::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserAdministrativeAction+RemoveClassifications, Relewise.Client")
        {
            return UserAdministrativeActionRemoveClassifications::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserAdministrativeAction+RemoveIdentifiers, Relewise.Client")
        {
            return UserAdministrativeActionRemoveIdentifiers::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
