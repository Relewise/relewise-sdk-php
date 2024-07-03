<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantChangeTriggerResult extends VariantChangeTriggerResultVariantChangeResultDetailsEntityChangeTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult, Relewise.Client";
    public static function create(UserResultDetails $user, VariantChangeTriggerResultVariantChangeResultDetails ... $entitiesWithChanges) : VariantChangeTriggerResult
    {
        $result = new VariantChangeTriggerResult();
        $result->user = $user;
        $result->entitiesWithChanges = $entitiesWithChanges;
        return $result;
    }
    public static function hydrate(array $arr) : VariantChangeTriggerResult
    {
        $result = VariantChangeTriggerResultVariantChangeResultDetailsEntityChangeTriggerResult::hydrateBase(new VariantChangeTriggerResult(), $arr);
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
