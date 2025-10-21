<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdsResponse extends DisplayAdstringDisplayAdEntityStateEntityResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.DisplayAdsResponse, Relewise.Client";
    public static function create(int $hits, array $hitsPerState) : DisplayAdsResponse
    {
        $result = new DisplayAdsResponse();
        $result->hits = $hits;
        $result->hitsPerState = $hitsPerState;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdsResponse
    {
        $result = DisplayAdstringDisplayAdEntityStateEntityResponse::hydrateBase(new DisplayAdsResponse(), $arr);
        return $result;
    }
    
    function setEntities(DisplayAd ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param DisplayAd[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(DisplayAd $entities)
    {
        if (!isset($this->entities))
        {
            $this->entities = array();
        }
        array_push($this->entities, $entities);
        return $this;
    }
    
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    
    function addToHitsPerState(DisplayAdEntityState $key, int $value)
    {
        if (!isset($this->hitsPerState))
        {
            $this->hitsPerState = array();
        }
        $this->hitsPerState[$key] = $value;
        return $this;
    }
    
    /** @param array<DisplayAdEntityState, int> $hitsPerState associative array. */
    function setHitsPerStateFromAssociativeArray(array $hitsPerState)
    {
        $this->hitsPerState = $hitsPerState;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
