<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPropertyChangedTriggerResult extends stringEntityPropertyChangedTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductPropertyChangedTriggerResult, Relewise.Client";
    public static function create(UserResultDetails $user, string ... $entitiesWithChanges) : ProductPropertyChangedTriggerResult
    {
        $result = new ProductPropertyChangedTriggerResult();
        $result->user = $user;
        $result->entitiesWithChanges = $entitiesWithChanges;
        return $result;
    }
    public static function hydrate(array $arr) : ProductPropertyChangedTriggerResult
    {
        $result = stringEntityPropertyChangedTriggerResult::hydrateBase(new ProductPropertyChangedTriggerResult(), $arr);
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
