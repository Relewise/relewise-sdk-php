<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class Content
{
    public string $id;
    public ?Multilingual $displayName;
    public ?array $categoryPaths;
    public ?array $assortments;
    public ?array $data;
    public static function create(string $id) : Content
    {
        $result = new Content();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : Content
    {
        $result = new Content();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = array();
            foreach($arr["categoryPaths"] as &$value)
            {
                array_push($result->categoryPaths, CategoryPath::hydrate($value));
            }
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
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withDisplayName(?Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withCategoryPaths(CategoryPath ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
}
