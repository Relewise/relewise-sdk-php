<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ObjectValueMinByCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueMinByCondition, Relewise.Client";
    public static function create(string $key, bool $negated = false) : ObjectValueMinByCondition
    {
        $result = new ObjectValueMinByCondition();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueMinByCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueMinByCondition(), $arr);
        return $result;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    function addToObjectPath(string $objectPath)
    {
        if (!isset($this->objectPath))
        {
            $this->objectPath = array();
        }
        array_push($this->objectPath, $objectPath);
        return $this;
    }
}
