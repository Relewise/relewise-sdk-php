<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ObjectValueMaxByCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueMaxByCondition, Relewise.Client";
    public static function create(string $key, bool $negated = false) : ObjectValueMaxByCondition
    {
        $result = new ObjectValueMaxByCondition();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueMaxByCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueMaxByCondition(), $arr);
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
    function setObjectPathFromArray(array $objectPath)
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
