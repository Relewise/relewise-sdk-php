<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesRetailMediaEntityEntityFilters
{
    public string $typeDefinition = "";
    public ?string $term;
    public ?array $states;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.DisplayAdTemplatesRequest+EntityFilters, Relewise.Client")
        {
            return DisplayAdTemplatesRequestEntityFilters::hydrate($arr);
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
                array_push($result->states, DisplayAdTemplateEntityState::from($value));
            }
        }
        return $result;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setStates(DisplayAdTemplateEntityState ... $states)
    {
        $this->states = $states;
        return $this;
    }
    
    /** @param ?DisplayAdTemplateEntityState[] $states new value. */
    function setStatesFromArray(array $states)
    {
        $this->states = $states;
        return $this;
    }
    
    function addToStates(DisplayAdTemplateEntityState $states)
    {
        if (!isset($this->states))
        {
            $this->states = array();
        }
        array_push($this->states, $states);
        return $this;
    }
}
