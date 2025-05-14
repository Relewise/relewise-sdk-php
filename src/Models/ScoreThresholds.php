<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines Score thresholds to be honored. */
class ScoreThresholds
{
    /** How well searched term is to match located entity, greater value indicate more relevant results. Produced <b>before</b> relevance modifiers and merchandising rules are applied. Expected to be from 0 (everything matches) to 100 (only exact matches) range. */
    public ?float $relevance;
    /** How well searched term is to match located entity with respect to relevance modifiers and merchandising rules. Example: out-of-stock products may be buried in results despite good match from search perspective. Expected to be from 0 (everything matches) to 100 (only exact matches) range. */
    public ?float $adjusted;
    
    public static function create() : ScoreThresholds
    {
        $result = new ScoreThresholds();
        return $result;
    }
    
    public static function hydrate(array $arr) : ScoreThresholds
    {
        $result = new ScoreThresholds();
        if (array_key_exists("relevance", $arr))
        {
            $result->relevance = $arr["relevance"];
        }
        if (array_key_exists("adjusted", $arr))
        {
            $result->adjusted = $arr["adjusted"];
        }
        return $result;
    }
    
    /** How well searched term is to match located entity, greater value indicate more relevant results. Produced <b>before</b> relevance modifiers and merchandising rules are applied. Expected to be from 0 (everything matches) to 100 (only exact matches) range. */
    function setRelevance(?float $relevance)
    {
        $this->relevance = $relevance;
        return $this;
    }
    
    /** How well searched term is to match located entity with respect to relevance modifiers and merchandising rules. Example: out-of-stock products may be buried in results despite good match from search perspective. Expected to be from 0 (everything matches) to 100 (only exact matches) range. */
    function setAdjusted(?float $adjusted)
    {
        $this->adjusted = $adjusted;
        return $this;
    }
}
