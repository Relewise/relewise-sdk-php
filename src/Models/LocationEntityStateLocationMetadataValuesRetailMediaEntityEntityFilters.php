<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class LocationEntityStateLocationMetadataValuesRetailMediaEntityEntityFilters
{
    public string $typeDefinition = "";
    public ?string $term;
    
    public ?array $states;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.LocationsRequest+EntityFilters, Relewise.Client")
        {
            return LocationsRequestEntityFilters::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("states", $arr))
        {
            $result->states = array();
            foreach($arr["states"] as &$value)
            {
                array_push($result->states, LocationEntityState::from($value));
            }
        }
        return $result;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setStates(LocationEntityState ... $states)
    {
        $this->states = $states;
        return $this;
    }
    
    /** @param ?LocationEntityState[] $states new value. */
    function setStatesFromArray(array $states)
    {
        $this->states = $states;
        return $this;
    }
    
    function addToStates(LocationEntityState $states)
    {
        if (!isset($this->states))
        {
            $this->states = array();
        }
        array_push($this->states, $states);
        return $this;
    }
}
