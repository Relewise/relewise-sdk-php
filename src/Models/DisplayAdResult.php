<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdResult
{
    public string $displayAdId;
    public ?string $name;
    public ?array $data;
    public ?ClickedByUserInfo $clickedByUserInfo;
    
    public static function create(string $displayAdId) : DisplayAdResult
    {
        $result = new DisplayAdResult();
        $result->displayAdId = $displayAdId;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdResult
    {
        $result = new DisplayAdResult();
        if (array_key_exists("displayAdId", $arr))
        {
            $result->displayAdId = $arr["displayAdId"];
        }
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("clickedByUserInfo", $arr))
        {
            $result->clickedByUserInfo = ClickedByUserInfo::hydrate($arr["clickedByUserInfo"]);
        }
        return $result;
    }
    
    function setDisplayAdId(string $displayAdId)
    {
        $this->displayAdId = $displayAdId;
        return $this;
    }
    
    function setName(?string $name)
    {
        $this->name = $name;
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
    
    function setClickedByUserInfo(?ClickedByUserInfo $clickedByUserInfo)
    {
        $this->clickedByUserInfo = $clickedByUserInfo;
        return $this;
    }
}
