<?php declare(strict_types=1);

namespace Relewise\Models;

/** Describes one entity data key used when scoring overlap against seeded content. */
class FeedEntityDataKey
{
    /** The name of the entity data key whose values should be used when determining overlaps. */
    public string $key;
    /** The relative importance of overlaps on this key when scoring content. */
    public float $weight;
    /** Indicates whether content must overlap on this key to qualify as a valid result. */
    public bool $required;
    /** Limits how many seed collection values are considered for this key. */
    public int $seedDataCollectionsLimit;
    /** Limits how many candidate collection values are considered for this key. */
    public int $candidateDataCollectionsLimit;
    
    public static function create(string $key, float $weight, int $seedDataCollectionsLimit, int $candidateDataCollectionsLimit, bool $required) : FeedEntityDataKey
    {
        $result = new FeedEntityDataKey();
        $result->key = $key;
        $result->weight = $weight;
        $result->seedDataCollectionsLimit = $seedDataCollectionsLimit;
        $result->candidateDataCollectionsLimit = $candidateDataCollectionsLimit;
        $result->required = $required;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedEntityDataKey
    {
        $result = new FeedEntityDataKey();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("weight", $arr))
        {
            $result->weight = $arr["weight"];
        }
        if (array_key_exists("required", $arr))
        {
            $result->required = $arr["required"];
        }
        if (array_key_exists("seedDataCollectionsLimit", $arr))
        {
            $result->seedDataCollectionsLimit = $arr["seedDataCollectionsLimit"];
        }
        if (array_key_exists("candidateDataCollectionsLimit", $arr))
        {
            $result->candidateDataCollectionsLimit = $arr["candidateDataCollectionsLimit"];
        }
        return $result;
    }
    
    /** The name of the entity data key whose values should be used when determining overlaps. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The relative importance of overlaps on this key when scoring content. */
    function setWeight(float $weight)
    {
        $this->weight = $weight;
        return $this;
    }
    
    /** Indicates whether content must overlap on this key to qualify as a valid result. */
    function setRequired(bool $required)
    {
        $this->required = $required;
        return $this;
    }
    
    /** Limits how many seed collection values are considered for this key. */
    function setSeedDataCollectionsLimit(int $seedDataCollectionsLimit)
    {
        $this->seedDataCollectionsLimit = $seedDataCollectionsLimit;
        return $this;
    }
    
    /** Limits how many candidate collection values are considered for this key. */
    function setCandidateDataCollectionsLimit(int $candidateDataCollectionsLimit)
    {
        $this->candidateDataCollectionsLimit = $candidateDataCollectionsLimit;
        return $this;
    }
}
