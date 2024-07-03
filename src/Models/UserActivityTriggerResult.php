<?php declare(strict_types=1);

namespace Relewise\Models;

class UserActivityTriggerResult
{
    public UserResultDetails $user;
    public static function create() : UserActivityTriggerResult
    {
        $result = new UserActivityTriggerResult();
        return $result;
    }
    public static function hydrate(array $arr) : UserActivityTriggerResult
    {
        $result = new UserActivityTriggerResult();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserResultDetails::hydrate($arr["user"]);
        }
        return $result;
    }
    function setUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
}
