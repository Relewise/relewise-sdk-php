<?php declare(strict_types=1);

namespace Relewise\Models;

class AdvertisersRequestEntityFilters extends AdvertiserEntityStateAdvertiserMetadataValuesRetailMediaEntityEntityFilters
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.AdvertisersRequest+EntityFilters, Relewise.Client";
    public ?array $ids;
    public static function create() : AdvertisersRequestEntityFilters
    {
        $result = new AdvertisersRequestEntityFilters();
        return $result;
    }
    public static function hydrate(array $arr) : AdvertisersRequestEntityFilters
    {
        $result = AdvertiserEntityStateAdvertiserMetadataValuesRetailMediaEntityEntityFilters::hydrateBase(new AdvertisersRequestEntityFilters(), $arr);
        if (array_key_exists("ids", $arr))
        {
            $result->ids = array();
            foreach($arr["ids"] as &$value)
            {
                array_push($result->ids, $value);
            }
        }
        return $result;
    }
    
    function setIds(string ... $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    
    /** @param ?string[] $ids new value. */
    function setIdsFromArray(array $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    
    function addToIds(string $ids)
    {
        if (!isset($this->ids))
        {
            $this->ids = array();
        }
        array_push($this->ids, $ids);
        return $this;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setStates(AdvertiserEntityState ... $states)
    {
        $this->states = $states;
        return $this;
    }
    
    /** @param ?AdvertiserEntityState[] $states new value. */
    function setStatesFromArray(array $states)
    {
        $this->states = $states;
        return $this;
    }
    
    function addToStates(AdvertiserEntityState $states)
    {
        if (!isset($this->states))
        {
            $this->states = array();
        }
        array_push($this->states, $states);
        return $this;
    }
}
