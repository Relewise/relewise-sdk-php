<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class AdvertiserSaveEntitiesResponse extends TimedResponse
{
    public string $typeDefinition = "";
    public array $entities;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.RetailMedia.SaveAdvertisersResponse, Relewise.Client")
        {
            return SaveAdvertisersResponse::hydrate($arr);
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
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
