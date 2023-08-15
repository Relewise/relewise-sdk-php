<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserConditionConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Configurations.UserConditionConfiguration, Relewise.Client";
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
    /**
     * Sets conditions to a new value.
     * @param UserConditionCollection $conditions new value.
     */
    function setConditions(UserConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
}
