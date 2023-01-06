<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ObjectValueMinByCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueMinByCondition, Relewise.Client";
    public static function create() : ObjectValueMinByCondition
    {
        $result = new ObjectValueMinByCondition();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueMinByCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueMinByCondition(), $arr);
        return $result;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
}
