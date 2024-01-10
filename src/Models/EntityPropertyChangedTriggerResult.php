<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class EntityPropertyChangedTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.EntityPropertyChangedTriggerResult, Relewise.Client";
    public UserResultDetails $user;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductPropertyChangedTriggerResult, Relewise.Client")
        {
            return ProductPropertyChangedTriggerResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
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
