<?php declare(strict_types=1);

namespace Relewise\Models;

class BatchedTrackingRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.BatchedTrackingRequest, Relewise.Client";
    public array $items;
    
    public static function create(Trackable ... $items) : BatchedTrackingRequest
    {
        $result = new BatchedTrackingRequest();
        $result->items = $items;
        return $result;
    }
    
    public static function hydrate(array $arr) : BatchedTrackingRequest
    {
        $result = TrackingRequest::hydrateBase(new BatchedTrackingRequest(), $arr);
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, Trackable::hydrate($value));
            }
        }
        return $result;
    }
    
    function setItems(Trackable ... $items)
    {
        $this->items = $items;
        return $this;
    }
    
    /** @param Trackable[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    
    function addToItems(Trackable $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
