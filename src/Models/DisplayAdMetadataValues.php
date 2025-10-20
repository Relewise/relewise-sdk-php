<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class DisplayAdMetadataValues extends MetadataValues implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Entities.DisplayAd+MetadataValues, Relewise.Client";
    public static function create() : DisplayAdMetadataValues
    {
        $result = new DisplayAdMetadataValues();
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdMetadataValues
    {
        $result = MetadataValues::hydrateBase(new DisplayAdMetadataValues(), $arr);
        return $result;
    }
    
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->created))
        {
            $result["created"] = $this->created->format(DATE_ATOM);
        }
        if (isset($this->createdBy))
        {
            $result["createdBy"] = $this->createdBy;
        }
        if (isset($this->modified))
        {
            $result["modified"] = $this->modified->format(DATE_ATOM);
        }
        if (isset($this->modifiedBy))
        {
            $result["modifiedBy"] = $this->modifiedBy;
        }
        return $result;
    }
}
