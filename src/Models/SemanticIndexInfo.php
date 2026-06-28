<?php declare(strict_types=1);

namespace Relewise\Models;

use DateInterval;
use Relewise\Factory\DateIntervalFactory;
class SemanticIndexInfo
{
    public SemanticIndexBuildStatus $status;
    public DateInterval $lastBuildDuration;
    
    public static function create() : SemanticIndexInfo
    {
        $result = new SemanticIndexInfo();
        return $result;
    }
    
    public static function hydrate(array $arr) : SemanticIndexInfo
    {
        $result = new SemanticIndexInfo();
        if (array_key_exists("status", $arr))
        {
            $result->status = SemanticIndexBuildStatus::from($arr["status"]);
        }
        if (array_key_exists("lastBuildDuration", $arr))
        {
            $result->lastBuildDuration = DateIntervalFactory::fromTimeSpanString($arr["lastBuildDuration"]);
        }
        return $result;
    }
    
    function setStatus(SemanticIndexBuildStatus $status)
    {
        $this->status = $status;
        return $this;
    }
    
    function setLastBuildDuration(DateInterval $lastBuildDuration)
    {
        $this->lastBuildDuration = $lastBuildDuration;
        return $this;
    }
}
