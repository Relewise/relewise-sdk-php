<?php declare(strict_types=1);

namespace Relewise\Models;

class CategoryIndexConfigurationEntry
{
    public FieldIndexConfiguration $id;
    public FieldIndexConfiguration $displayName;
    public DataIndexConfiguration $data;
    public static function create() : CategoryIndexConfigurationEntry
    {
        $result = new CategoryIndexConfigurationEntry();
        return $result;
    }
    public static function hydrate(array $arr) : CategoryIndexConfigurationEntry
    {
        $result = new CategoryIndexConfigurationEntry();
        if (array_key_exists("id", $arr))
        {
            $result->id = FieldIndexConfiguration::hydrate($arr["id"]);
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = FieldIndexConfiguration::hydrate($arr["displayName"]);
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
    
    function setData(DataIndexConfiguration $data)
    {
        $this->data = $data;
        return $this;
    }
}
