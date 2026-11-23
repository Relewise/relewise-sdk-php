<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryNameAndIdResult
{
    public string $id;
    public string $displayName;
    public ?CategoryResult $category;
    
    public static function create(string $id, string $displayName) : CategoryNameAndIdResult
    {
        $result = new CategoryNameAndIdResult();
        $result->id = $id;
        $result->displayName = $displayName;
        return $result;
    }
    
    public static function hydrate(array $arr) : CategoryNameAndIdResult
    {
        $result = new CategoryNameAndIdResult();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("category", $arr))
        {
            $result->category = CategoryResult::hydrate($arr["category"]);
        }
        return $result;
    }
    
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setCategory(?CategoryResult $category)
    {
        $this->category = $category;
        return $this;
    }
}
