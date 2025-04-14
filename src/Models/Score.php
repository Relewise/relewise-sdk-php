<?php declare(strict_types=1);

namespace Relewise\Models;

/** Holds scores for a result. */
class Score
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Score, Relewise.Client";
    /** The base score is a number between 0 and 100 that has not been manipulated by relevance modifiers and merchandising rules. Greater values indicate better results. */
    public int $base;
    /** The adjusted score is based on the base score but with relevance modifiers and merchandising rules applied. */
    public int $adjusted;
    
    public static function create(int $baseScore, int $adjustedScore) : Score
    {
        $result = new Score();
        $result->base = $baseScore;
        $result->adjusted = $adjustedScore;
        return $result;
    }
    
    public static function hydrate(array $arr) : Score
    {
        $result = new Score();
        if (array_key_exists("base", $arr))
        {
            $result->base = $arr["base"];
        }
        if (array_key_exists("adjusted", $arr))
        {
            $result->adjusted = $arr["adjusted"];
        }
        return $result;
    }
    
    /** The base score is a number between 0 and 100 that has not been manipulated by relevance modifiers and merchandising rules. Greater values indicate better results. */
    function setBase(int $base)
    {
        $this->base = $base;
        return $this;
    }
    
    /** The adjusted score is based on the base score but with relevance modifiers and merchandising rules applied. */
    function setAdjusted(int $adjusted)
    {
        $this->adjusted = $adjusted;
        return $this;
    }
}
