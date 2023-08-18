<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Brand
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Brand, Relewise.Client";
    public string $id;
    public ?string $displayName;
    public ?array $assortments;
    public ?array $data;
    public static function create(string $id) : Brand
    {
        $result = new Brand();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : Brand
    {
        $result = new Brand();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        return $result;
    }
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDisplayName(?string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param ?int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    function addToData(string $key, DataValue $value)
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
     * @param ?array<string, DataValue> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
