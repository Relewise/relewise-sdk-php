<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductChangeTriggerResultProductChangeResultDetailsEntityChangeTriggerResult extends EntityChangeTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.EntityChangeTriggerResult`1[[Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult+ProductChangeResultDetails, Relewise.Client, Version=1.156.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $entitiesWithChanges;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult, Relewise.Client")
        {
            return ProductChangeTriggerResult::hydrate($arr);
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
                array_push($result->entitiesWithChanges, ProductChangeTriggerResultProductChangeResultDetails::hydrate($value));
            }
        }
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
