<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** Contains information about the status of the rebuild process for a search index, these values are set server side, any values set from client is ignored */
class RebuildStatus implements JsonSerializable
{
    /** Indicates whether the rebuild process is currently in progress. This property is set server-side during modification. Any value sent from the client will be ignored. */
    public bool $isRebuilding;
    /** Indicates whether the data is considered stale and the index is awaiting a rebuild. This property is set server-side during modification. Any value sent from the client will be ignored. */
    public bool $isStale;
    /** The timestamp when the last rebuild process started. This property is set server-side during modification. Any value sent from the client will be ignored. */
    public DateTime $lastRebuildStarted;
    /** The timestamp when the last rebuild process was completed. This property is set server-side during modification. Any value sent from the client will be ignored. */
    public DateTime $lastRebuildCompleted;
    /** The timestamp representing the last time this index had an opportunity to perform a rebuild This property is set server-side during modification. Any value sent from the client will be ignored. */
    public DateTime $lastRebuildOpportunity;
    /** The duration of the last rebuild. This property is set server-side during modification. Any value sent from the client will be ignored. */
    public TimeSpan $lastRebuildDuration;
    /** Indicates whether the index have been built and is in a ready state to support searches. This property is set server-side. Any value sent from the client will be ignored. */
    public bool $isBuilt;
    /** Indicates whether the index is a partially built index. The initial build of an index is always partial to minimize the time it takes before the index becomes ready to support searches As soon as an initial partial index is built, a full non-partial index is queued for re-indexing immediately to replace the partial built one asap. This property is set server-side. Any value sent from the client will be ignored. */
    public bool $isPartial;
    /** The timestamp representing the last time this index has been marked as stale, meaning it requires a rebuild. This property is set server-side. Any value sent from the client will be ignored. */
    public DateTime $lastMarkedAsStale;
    /** The duration of how long the index has currently been marked as stale, waiting for a rebuild to be performed. Will be zero if the index is not currently stale This property is set server-side. Any value sent from the client will be ignored. */
    public TimeSpan $staleDuration;
    /** The duration of how long the index was previously marked as stale before it was rebuilt. This property is set server-side. Any value sent from the client will be ignored. */
    public TimeSpan $lastStaleDuration;
    
    public static function create(bool $isBuilt, bool $isPartial, bool $isRebuilding, bool $isStale, DateTime $lastRebuildStarted, DateTime $lastRebuildCompleted, DateTime $lastRebuildOpportunity, TimeSpan $lastRebuildDuration, DateTime $lastMarkedAsStale, TimeSpan $staleDuration, TimeSpan $lastStaleDuration) : RebuildStatus
    {
        $result = new RebuildStatus();
        $result->isBuilt = $isBuilt;
        $result->isPartial = $isPartial;
        $result->isRebuilding = $isRebuilding;
        $result->isStale = $isStale;
        $result->lastRebuildStarted = $lastRebuildStarted;
        $result->lastRebuildCompleted = $lastRebuildCompleted;
        $result->lastRebuildOpportunity = $lastRebuildOpportunity;
        $result->lastRebuildDuration = $lastRebuildDuration;
        $result->lastMarkedAsStale = $lastMarkedAsStale;
        $result->staleDuration = $staleDuration;
        $result->lastStaleDuration = $lastStaleDuration;
        return $result;
    }
    
    public static function hydrate(array $arr) : RebuildStatus
    {
        $result = new RebuildStatus();
        if (array_key_exists("isRebuilding", $arr))
        {
            $result->isRebuilding = $arr["isRebuilding"];
        }
        if (array_key_exists("isStale", $arr))
        {
            $result->isStale = $arr["isStale"];
        }
        if (array_key_exists("lastRebuildStarted", $arr))
        {
            $result->lastRebuildStarted = new DateTime($arr["lastRebuildStarted"]);
        }
        if (array_key_exists("lastRebuildCompleted", $arr))
        {
            $result->lastRebuildCompleted = new DateTime($arr["lastRebuildCompleted"]);
        }
        if (array_key_exists("lastRebuildOpportunity", $arr))
        {
            $result->lastRebuildOpportunity = new DateTime($arr["lastRebuildOpportunity"]);
        }
        if (array_key_exists("lastRebuildDuration", $arr))
        {
            $result->lastRebuildDuration = TimeSpan::hydrate($arr["lastRebuildDuration"]);
        }
        if (array_key_exists("isBuilt", $arr))
        {
            $result->isBuilt = $arr["isBuilt"];
        }
        if (array_key_exists("isPartial", $arr))
        {
            $result->isPartial = $arr["isPartial"];
        }
        if (array_key_exists("lastMarkedAsStale", $arr))
        {
            $result->lastMarkedAsStale = new DateTime($arr["lastMarkedAsStale"]);
        }
        if (array_key_exists("staleDuration", $arr))
        {
            $result->staleDuration = TimeSpan::hydrate($arr["staleDuration"]);
        }
        if (array_key_exists("lastStaleDuration", $arr))
        {
            $result->lastStaleDuration = TimeSpan::hydrate($arr["lastStaleDuration"]);
        }
        return $result;
    }
    
    /** Indicates whether the rebuild process is currently in progress. This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setIsRebuilding(bool $isRebuilding)
    {
        $this->isRebuilding = $isRebuilding;
        return $this;
    }
    
    /** Indicates whether the data is considered stale and the index is awaiting a rebuild. This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setIsStale(bool $isStale)
    {
        $this->isStale = $isStale;
        return $this;
    }
    
    /** The timestamp when the last rebuild process started. This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setLastRebuildStarted(DateTime $lastRebuildStarted)
    {
        $this->lastRebuildStarted = $lastRebuildStarted;
        return $this;
    }
    
    /** The timestamp when the last rebuild process was completed. This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setLastRebuildCompleted(DateTime $lastRebuildCompleted)
    {
        $this->lastRebuildCompleted = $lastRebuildCompleted;
        return $this;
    }
    
    /** The timestamp representing the last time this index had an opportunity to perform a rebuild This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setLastRebuildOpportunity(DateTime $lastRebuildOpportunity)
    {
        $this->lastRebuildOpportunity = $lastRebuildOpportunity;
        return $this;
    }
    
    /** The duration of the last rebuild. This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setLastRebuildDuration(TimeSpan $lastRebuildDuration)
    {
        $this->lastRebuildDuration = $lastRebuildDuration;
        return $this;
    }
    
    /** Indicates whether the index have been built and is in a ready state to support searches. This property is set server-side. Any value sent from the client will be ignored. */
    function setIsBuilt(bool $isBuilt)
    {
        $this->isBuilt = $isBuilt;
        return $this;
    }
    
    /** Indicates whether the index is a partially built index. The initial build of an index is always partial to minimize the time it takes before the index becomes ready to support searches As soon as an initial partial index is built, a full non-partial index is queued for re-indexing immediately to replace the partial built one asap. This property is set server-side. Any value sent from the client will be ignored. */
    function setIsPartial(bool $isPartial)
    {
        $this->isPartial = $isPartial;
        return $this;
    }
    
    /** The timestamp representing the last time this index has been marked as stale, meaning it requires a rebuild. This property is set server-side. Any value sent from the client will be ignored. */
    function setLastMarkedAsStale(DateTime $lastMarkedAsStale)
    {
        $this->lastMarkedAsStale = $lastMarkedAsStale;
        return $this;
    }
    
    /** The duration of how long the index has currently been marked as stale, waiting for a rebuild to be performed. Will be zero if the index is not currently stale This property is set server-side. Any value sent from the client will be ignored. */
    function setStaleDuration(TimeSpan $staleDuration)
    {
        $this->staleDuration = $staleDuration;
        return $this;
    }
    
    /** The duration of how long the index was previously marked as stale before it was rebuilt. This property is set server-side. Any value sent from the client will be ignored. */
    function setLastStaleDuration(TimeSpan $lastStaleDuration)
    {
        $this->lastStaleDuration = $lastStaleDuration;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->isRebuilding))
        {
            $result["isRebuilding"] = $this->isRebuilding;
        }
        if (isset($this->isStale))
        {
            $result["isStale"] = $this->isStale;
        }
        if (isset($this->lastRebuildStarted))
        {
            $result["lastRebuildStarted"] = $this->lastRebuildStarted->format(DATE_ATOM);
        }
        if (isset($this->lastRebuildCompleted))
        {
            $result["lastRebuildCompleted"] = $this->lastRebuildCompleted->format(DATE_ATOM);
        }
        if (isset($this->lastRebuildOpportunity))
        {
            $result["lastRebuildOpportunity"] = $this->lastRebuildOpportunity->format(DATE_ATOM);
        }
        if (isset($this->lastRebuildDuration))
        {
            $result["lastRebuildDuration"] = $this->lastRebuildDuration;
        }
        if (isset($this->isBuilt))
        {
            $result["isBuilt"] = $this->isBuilt;
        }
        if (isset($this->isPartial))
        {
            $result["isPartial"] = $this->isPartial;
        }
        if (isset($this->lastMarkedAsStale))
        {
            $result["lastMarkedAsStale"] = $this->lastMarkedAsStale->format(DATE_ATOM);
        }
        if (isset($this->staleDuration))
        {
            $result["staleDuration"] = $this->staleDuration;
        }
        if (isset($this->lastStaleDuration))
        {
            $result["lastStaleDuration"] = $this->lastStaleDuration;
        }
        return $result;
    }
}
