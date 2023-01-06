<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ExpectedSearchTermResult
{
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
    function withEstimatedHits(int $estimatedHits)
    {
        $this->estimatedHits = $estimatedHits;
        return $this;
    }
    function withType(EntityType $type)
    {
        $this->type = $type;
        return $this;
    }
}
