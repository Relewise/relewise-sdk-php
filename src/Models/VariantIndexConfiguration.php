<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantIndexConfiguration
{
    public FieldIndexConfiguration $id;
    
    public FieldIndexConfiguration $displayName;
    
    public SpecificationsIndexConfiguration $specifications;
    
    public DataIndexConfiguration $data;
    
    public static function create() : VariantIndexConfiguration
    {
        $result = new VariantIndexConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantIndexConfiguration
    {
        $result = new VariantIndexConfiguration();
        if (array_key_exists("id", $arr))
        {
            $result->id = FieldIndexConfiguration::hydrate($arr["id"]);
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = FieldIndexConfiguration::hydrate($arr["displayName"]);
        }
        if (array_key_exists("specifications", $arr))
        {
            $result->specifications = SpecificationsIndexConfiguration::hydrate($arr["specifications"]);
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
    
    function setSpecifications(SpecificationsIndexConfiguration $specifications)
    {
        $this->specifications = $specifications;
        return $this;
    }
    
    function setData(DataIndexConfiguration $data)
    {
        $this->data = $data;
        return $this;
    }
}
