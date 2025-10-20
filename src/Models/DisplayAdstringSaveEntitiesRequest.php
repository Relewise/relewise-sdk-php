<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class DisplayAdstringSaveEntitiesRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    public array $entities;
    public string $modifiedBy;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.SaveDisplayAdsRequest, Relewise.Client")
        {
            return SaveDisplayAdsRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("entities", $arr))
        {
            $result->entities = array();
            foreach($arr["entities"] as &$value)
            {
                array_push($result->entities, DisplayAd::hydrate($value));
            }
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
