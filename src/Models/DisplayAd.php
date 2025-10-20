<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAd extends DisplayAdEntityStatestringDisplayAdMetadataValuesRetailMediaEntity
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Entities.DisplayAd, Relewise.Client";
    public string $name;
    public string $advertiserId;
    public string $templateId;
    public ?array $data;
    
    public static function create(string $id, DisplayAdEntityState $state, string $name, string $advertiserId, string $templateId) : DisplayAd
    {
        $result = new DisplayAd();
        $result->id = $id;
        $result->state = $state;
        $result->name = $name;
        $result->advertiserId = $advertiserId;
        $result->templateId = $templateId;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAd
    {
        $result = DisplayAdEntityStatestringDisplayAdMetadataValuesRetailMediaEntity::hydrateBase(new DisplayAd(), $arr);
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("advertiserId", $arr))
        {
            $result->advertiserId = $arr["advertiserId"];
        }
        if (array_key_exists("templateId", $arr))
        {
            $result->templateId = $arr["templateId"];
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
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setAdvertiserId(string $advertiserId)
    {
        $this->advertiserId = $advertiserId;
        return $this;
    }
    
    function setTemplateId(string $templateId)
    {
        $this->templateId = $templateId;
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
    
    function setState(DisplayAdEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    function setMetadata(DisplayAdMetadataValues $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
}
