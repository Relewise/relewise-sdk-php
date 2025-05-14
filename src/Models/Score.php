<?php declare(strict_types=1);

namespace Relewise\Models;

/** Holds scores for a result. */
class Score
{
    /** The relevance score is a number between 0 and 100 that has not been manipulated by relevance modifiers and merchandising rules. Greater values indicate better results. */
    public ?float $relevance;
    /** The adjusted score is based on the relevance score but with relevance modifiers and merchandising rules applied. */
    public ?float $adjusted;
    
    public static function create() : Score
    {
        $result = new Score();
        return $result;
    }
    
    public static function hydrate(array $arr) : Score
    {
        $result = new Score();
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
    
    /** The relevance score is a number between 0 and 100 that has not been manipulated by relevance modifiers and merchandising rules. Greater values indicate better results. */
    function setRelevance(?float $relevance)
    {
        $this->relevance = $relevance;
        return $this;
    }
    
    /** The adjusted score is based on the relevance score but with relevance modifiers and merchandising rules applied. */
    function setAdjusted(?float $adjusted)
    {
        $this->adjusted = $adjusted;
        return $this;
    }
}
