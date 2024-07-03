<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductChangeTriggerResult extends ProductChangeTriggerResultProductChangeResultDetailsEntityChangeTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult, Relewise.Client";
    public static function create(UserResultDetails $user, ProductChangeTriggerResultProductChangeResultDetails ... $entitiesWithChanges) : ProductChangeTriggerResult
    {
        $result = new ProductChangeTriggerResult();
        $result->user = $user;
        $result->entitiesWithChanges = $entitiesWithChanges;
        return $result;
    }
    public static function hydrate(array $arr) : ProductChangeTriggerResult
    {
        $result = ProductChangeTriggerResultProductChangeResultDetailsEntityChangeTriggerResult::hydrateBase(new ProductChangeTriggerResult(), $arr);
        return $result;
    }
    function setEntitiesWithChanges(ProductChangeTriggerResultProductChangeResultDetails ... $entitiesWithChanges)
    {
        $this->entitiesWithChanges = $entitiesWithChanges;
        return $this;
    }
    /** @param ProductChangeTriggerResultProductChangeResultDetails[] $entitiesWithChanges new value. */
    function setEntitiesWithChangesFromArray(array $entitiesWithChanges)
    {
        $this->entitiesWithChanges = $entitiesWithChanges;
        return $this;
    }
    function addToEntitiesWithChanges(ProductChangeTriggerResultProductChangeResultDetails $entitiesWithChanges)
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
