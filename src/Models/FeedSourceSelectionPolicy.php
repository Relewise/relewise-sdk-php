<?php declare(strict_types=1);

namespace Relewise\Models;

/** Determines how a feed source is prioritized and how ties are broken. */
class FeedSourceSelectionPolicy
{
    /** The selection order where lower values are chosen first. */
    public int $priority;
    /** Relative weight for choosing between feed sources with the same priority. */
    public float $tieBreakerProbability;
    
    public static function create(int $priority, float $tieBreakerProbability) : FeedSourceSelectionPolicy
    {
        $result = new FeedSourceSelectionPolicy();
        $result->priority = $priority;
        $result->tieBreakerProbability = $tieBreakerProbability;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedSourceSelectionPolicy
    {
        $result = new FeedSourceSelectionPolicy();
        if (array_key_exists("priority", $arr))
        {
            $result->priority = $arr["priority"];
        }
        if (array_key_exists("tieBreakerProbability", $arr))
        {
            $result->tieBreakerProbability = $arr["tieBreakerProbability"];
        }
        return $result;
    }
    
    /** The selection order where lower values are chosen first. */
    function setPriority(int $priority)
    {
        $this->priority = $priority;
        return $this;
    }
    
    /** Relative weight for choosing between feed sources with the same priority. */
    function setTieBreakerProbability(float $tieBreakerProbability)
    {
        $this->tieBreakerProbability = $tieBreakerProbability;
        return $this;
    }
}
