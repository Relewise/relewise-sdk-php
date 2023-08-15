<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RedirectResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RedirectResult, Relewise.Client";
    public string $id;
    public SearchTermCondition $condition;
    public ?string $destination;
    public ?array $data;
    public static function create(string $id, SearchTermCondition $condition, ?string $destination, ?array $data) : RedirectResult
    {
        $result = new RedirectResult();
        $result->id = $id;
        $result->condition = $condition;
        $result->destination = $destination;
        $result->data = $data;
        return $result;
    }
    public static function hydrate(array $arr) : RedirectResult
    {
        $result = new RedirectResult();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("condition", $arr))
        {
            $result->condition = SearchTermCondition::hydrate($arr["condition"]);
        }
        if (array_key_exists("destination", $arr))
        {
            $result->destination = $arr["destination"];
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = $value;
            }
        }
        return $result;
    }
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets condition to a new value.
     * @param SearchTermCondition $condition new value.
     */
    function setCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    /**
     * Sets destination to a new value.
     * @param ?string $destination new value.
     */
    function setDestination(?string $destination)
    {
        $this->destination = $destination;
        return $this;
    }
    /**
     * Sets the value of a specific key in data.
     * @param string $key index.
     * @param string $value new value.
     */
    function addToData(string $key, string $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /**
     * Sets data to a new value.
     * @param ?array<string, string> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
