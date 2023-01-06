<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RedirectResult
{
    public string $id;
    public SearchTermCondition $condition;
    public ?string $destination;
    public ?array $data;
    public static function create(string $id, SearchTermCondition $condition, ?string $destination, ... $data) : RedirectResult
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
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    function withDestination(?string $destination)
    {
        $this->destination = $destination;
        return $this;
    }
    function addData(string $key, string $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
}
