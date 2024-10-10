<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class AdvertiserAdvertiserEntityStateEntityResponse extends TimedResponse
{
    public string $typeDefinition = "";
    
    public array $entities;
    
    public int $hits;
    
    public array $hitsPerState;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.RetailMedia.AdvertisersResponse, Relewise.Client")
        {
            return AdvertisersResponse::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TimedResponse::hydrateBase($result, $arr);
        if (array_key_exists("entities", $arr))
        {
            $result->entities = array();
            foreach($arr["entities"] as &$value)
            {
                array_push($result->entities, Advertiser::hydrate($value));
            }
        }
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        if (array_key_exists("hitsPerState", $arr))
        {
            $result->hitsPerState = array();
            foreach($arr["hitsPerState"] as $key => $value)
            {
                $result->hitsPerState[AdvertiserEntityState::from($key)] = $value;
            }
        }
        return $result;
    }
    
    function setEntities(Advertiser ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param Advertiser[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(Advertiser $entities)
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
    
    function addToHitsPerState(AdvertiserEntityState $key, int $value)
    {
        if (!isset($this->hitsPerState))
        {
            $this->hitsPerState = array();
        }
        $this->hitsPerState[$key] = $value;
        return $this;
    }
    
    /** @param array<AdvertiserEntityState, int> $hitsPerState associative array. */
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
