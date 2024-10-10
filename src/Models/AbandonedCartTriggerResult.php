<?php declare(strict_types=1);

namespace Relewise\Models;

class AbandonedCartTriggerResult
{
    public UserResultDetails $user;
    public static function create() : AbandonedCartTriggerResult
    {
        $result = new AbandonedCartTriggerResult();
        return $result;
    }
    
    public static function hydrate(array $arr) : AbandonedCartTriggerResult
    {
        $result = new AbandonedCartTriggerResult();
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
