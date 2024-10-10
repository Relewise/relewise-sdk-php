<?php declare(strict_types=1);

namespace Relewise\Models;

class Company
{
    public string $id;
    public ?Company $parent;
    public ?array $data;
    public static function create(string $id) : Company
    {
        $result = new Company();
        $result->id = $id;
        return $result;
    }
    
    public static function hydrate(array $arr) : Company
    {
        $result = new Company();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("parent", $arr))
        {
            $result->parent = Company::hydrate($arr["parent"]);
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
    
    function setParent(?Company $parent)
    {
        $this->parent = $parent;
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
    
    /** @param ?array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
