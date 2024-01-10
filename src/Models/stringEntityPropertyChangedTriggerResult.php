<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class stringEntityPropertyChangedTriggerResult extends EntityPropertyChangedTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.EntityPropertyChangedTriggerResult`1[[System.String, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public array $entitiesWithChanges;
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
        $result = EntityPropertyChangedTriggerResult::hydrateBase($result, $arr);
        if (array_key_exists("entitiesWithChanges", $arr))
        {
            $result->entitiesWithChanges = array();
            foreach($arr["entitiesWithChanges"] as &$value)
            {
                array_push($result->entitiesWithChanges, $value);
            }
        }
        return $result;
    }
    function setEntitiesWithChanges(string ... $entitiesWithChanges)
    {
        $this->entitiesWithChanges = $entitiesWithChanges;
        return $this;
    }
    /** @param string[] $entitiesWithChanges new value. */
    function setEntitiesWithChangesFromArray(array $entitiesWithChanges)
    {
        $this->entitiesWithChanges = $entitiesWithChanges;
        return $this;
    }
    function addToEntitiesWithChanges(string $entitiesWithChanges)
    {
        if (!isset($this->entitiesWithChanges))
        {
            $this->entitiesWithChanges = array();
        }
        array_push($this->entitiesWithChanges, $entitiesWithChanges);
        return $this;
    }
    function setUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
}
