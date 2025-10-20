<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplate extends DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesRetailMediaEntity
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Entities.DisplayAdTemplate, Relewise.Client";
    public string $name;
    public array $fields;
    
    public static function create(?string $id, DisplayAdTemplateEntityState $state, string $name, DisplayAdTemplateFieldDefinition ... $fields) : DisplayAdTemplate
    {
        $result = new DisplayAdTemplate();
        $result->id = $id;
        $result->state = $state;
        $result->name = $name;
        $result->fields = $fields;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplate
    {
        $result = DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesRetailMediaEntity::hydrateBase(new DisplayAdTemplate(), $arr);
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("fields", $arr))
        {
            $result->fields = array();
            foreach($arr["fields"] as &$value)
            {
                array_push($result->fields, DisplayAdTemplateFieldDefinition::hydrate($value));
            }
        }
        return $result;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setFields(DisplayAdTemplateFieldDefinition ... $fields)
    {
        $this->fields = $fields;
        return $this;
    }
    
    /** @param DisplayAdTemplateFieldDefinition[] $fields new value. */
    function setFieldsFromArray(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }
    
    function addToFields(DisplayAdTemplateFieldDefinition $fields)
    {
        if (!isset($this->fields))
        {
            $this->fields = array();
        }
        array_push($this->fields, $fields);
        return $this;
    }
    
    function setState(DisplayAdTemplateEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    function setMetadata(DisplayAdTemplateMetadataValues $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
}
