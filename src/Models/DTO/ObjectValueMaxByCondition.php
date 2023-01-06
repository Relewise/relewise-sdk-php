<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ObjectValueMaxByCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueMaxByCondition, Relewise.Client";
    public static function create() : ObjectValueMaxByCondition
    {
        $result = new ObjectValueMaxByCondition();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueMaxByCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueMaxByCondition(), $arr);
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
