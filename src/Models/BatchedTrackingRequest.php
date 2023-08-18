<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets items to a new value from an array.
     * @param Trackable[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param Trackable $items new element.
     */
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
