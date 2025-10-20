<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplateFieldDefinition
{
    public string $name;
    public DataValueDataValueTypes $type;
    public ?array $metadata;
    
    public static function create(string $name, DataValueDataValueTypes $type, array $metadata) : DisplayAdTemplateFieldDefinition
    {
        $result = new DisplayAdTemplateFieldDefinition();
        $result->name = $name;
        $result->type = $type;
        $result->metadata = $metadata;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplateFieldDefinition
    {
        $result = new DisplayAdTemplateFieldDefinition();
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = DataValueDataValueTypes::from($arr["type"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = array();
            foreach($arr["metadata"] as $key => $value)
            {
                $result->metadata[$key] = $value;
            }
        }
        return $result;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setType(DataValueDataValueTypes $type)
    {
        $this->type = $type;
        return $this;
    }
    
    function addToMetadata(string $key, string $value)
    {
        if (!isset($this->metadata))
        {
            $this->metadata = array();
        }
        $this->metadata[$key] = $value;
        return $this;
    }
    
    /** @param ?array<string, string> $metadata associative array. */
    function setMetadataFromAssociativeArray(array $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
}
