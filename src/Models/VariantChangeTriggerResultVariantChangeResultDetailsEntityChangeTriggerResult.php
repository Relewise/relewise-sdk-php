<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class VariantChangeTriggerResultVariantChangeResultDetailsEntityChangeTriggerResult extends EntityChangeTriggerResult
{
    public string $typeDefinition = "";
    public array $entitiesWithChanges;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult, Relewise.Client")
        {
            return VariantChangeTriggerResult::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = EntityChangeTriggerResult::hydrateBase($result, $arr);
        if (array_key_exists("entitiesWithChanges", $arr))
        {
            $result->entitiesWithChanges = array();
            foreach($arr["entitiesWithChanges"] as &$value)
            {
                array_push($result->entitiesWithChanges, VariantChangeTriggerResultVariantChangeResultDetails::hydrate($value));
            }
        }
        return $result;
    }
    
    function setEntitiesWithChanges(VariantChangeTriggerResultVariantChangeResultDetails ... $entitiesWithChanges)
    {
        $this->entitiesWithChanges = $entitiesWithChanges;
        return $this;
    }
    
    /** @param VariantChangeTriggerResultVariantChangeResultDetails[] $entitiesWithChanges new value. */
    function setEntitiesWithChangesFromArray(array $entitiesWithChanges)
    {
        $this->entitiesWithChanges = $entitiesWithChanges;
        return $this;
    }
    
    function addToEntitiesWithChanges(VariantChangeTriggerResultVariantChangeResultDetails $entitiesWithChanges)
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
