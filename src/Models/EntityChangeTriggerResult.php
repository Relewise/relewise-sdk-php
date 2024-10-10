<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class EntityChangeTriggerResult
{
    public string $typeDefinition = "";
    public UserResultDetails $user;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult, Relewise.Client")
        {
            return ProductChangeTriggerResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult, Relewise.Client")
        {
            return VariantChangeTriggerResult::hydrate($arr);
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
