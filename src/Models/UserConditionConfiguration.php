<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserConditionConfiguration
{
    public UserConditionCollection $conditions;
    public static function create() : UserConditionConfiguration
    {
        $result = new UserConditionConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : UserConditionConfiguration
    {
        $result = new UserConditionConfiguration();
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = UserConditionCollection::hydrate($arr["conditions"]);
        }
        return $result;
    }
    function setConditions(UserConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
}
