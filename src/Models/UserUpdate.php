<?php declare(strict_types=1);

namespace Relewise\Models;

class UserUpdate extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserUpdate, Relewise.Client";
    public User $user;
    public UserUpdateUpdateKind $kind;
    public static function create(User $user, UserUpdateUpdateKind $updateKind = UserUpdateUpdateKind::UpdateAndAppend) : UserUpdate
    {
        $result = new UserUpdate();
        $result->user = $user;
        $result->kind = $updateKind;
        return $result;
    }
    
    public static function hydrate(array $arr) : UserUpdate
    {
        $result = Trackable::hydrateBase(new UserUpdate(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("kind", $arr))
        {
            $result->kind = UserUpdateUpdateKind::from($arr["kind"]);
        }
        return $result;
    }
    
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setKind(UserUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
