<?php declare(strict_types=1);

namespace Relewise\Models;

class PredictionConfiguration
{
    public bool $includeInPredictions;
    
    public static function create() : PredictionConfiguration
    {
        $result = new PredictionConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : PredictionConfiguration
    {
        $result = new PredictionConfiguration();
        if (array_key_exists("includeInPredictions", $arr))
        {
            $result->includeInPredictions = $arr["includeInPredictions"];
        }
        return $result;
    }
    
    function setIncludeInPredictions(bool $includeInPredictions)
    {
        $this->includeInPredictions = $includeInPredictions;
        return $this;
    }
}
