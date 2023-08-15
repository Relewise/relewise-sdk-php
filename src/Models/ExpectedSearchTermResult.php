<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ExpectedSearchTermResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ExpectedSearchTermResult, Relewise.Client";
    public int $estimatedHits;
    public EntityType $type;
    public static function create() : ExpectedSearchTermResult
    {
        $result = new ExpectedSearchTermResult();
        return $result;
    }
    public static function hydrate(array $arr) : ExpectedSearchTermResult
    {
        $result = new ExpectedSearchTermResult();
        if (array_key_exists("estimatedHits", $arr))
        {
            $result->estimatedHits = $arr["estimatedHits"];
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = EntityType::from($arr["type"]);
        }
        return $result;
    }
    /**
     * Sets estimatedHits to a new value.
     * @param int $estimatedHits new value.
     */
    function setEstimatedHits(int $estimatedHits)
    {
        $this->estimatedHits = $estimatedHits;
        return $this;
    }
    /**
     * Sets type to a new value.
     * @param EntityType $type new value.
     */
    function setType(EntityType $type)
    {
        $this->type = $type;
        return $this;
    }
}
