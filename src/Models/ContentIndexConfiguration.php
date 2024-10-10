<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentIndexConfiguration
{
    public FieldIndexConfiguration $id;
    public FieldIndexConfiguration $displayName;
    public CategoryIndexConfiguration $category;
    public DataIndexConfiguration $data;
    
    public static function create() : ContentIndexConfiguration
    {
        $result = new ContentIndexConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentIndexConfiguration
    {
        $result = new ContentIndexConfiguration();
        if (array_key_exists("id", $arr))
        {
            $result->id = FieldIndexConfiguration::hydrate($arr["id"]);
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = FieldIndexConfiguration::hydrate($arr["displayName"]);
        }
        if (array_key_exists("category", $arr))
        {
            $result->category = CategoryIndexConfiguration::hydrate($arr["category"]);
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = DataIndexConfiguration::hydrate($arr["data"]);
        }
        return $result;
    }
    
    function setId(FieldIndexConfiguration $id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setDisplayName(FieldIndexConfiguration $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setCategory(CategoryIndexConfiguration $category)
    {
        $this->category = $category;
        return $this;
    }
    
    function setData(DataIndexConfiguration $data)
    {
        $this->data = $data;
        return $this;
    }
}
