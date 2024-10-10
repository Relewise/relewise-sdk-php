<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class LocationMetadataValues extends MetadataValues implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Location+MetadataValues, Relewise.Client";
    
    public ?DateTime $inactivated;
    public ?string $inactivatedBy;
    public ?DateTime $activated;
    public ?string $activatedBy;
    public ?DateTime $archived;
    public ?string $archivedBy;
    public static function create() : LocationMetadataValues
    {
        $result = new LocationMetadataValues();
        return $result;
    }
    
    public static function hydrate(array $arr) : LocationMetadataValues
    {
        $result = MetadataValues::hydrateBase(new LocationMetadataValues(), $arr);
        if (array_key_exists("inactivated", $arr))
        {
            $result->inactivated = new DateTime($arr["inactivated"]);
        }
        if (array_key_exists("inactivatedBy", $arr))
        {
            $result->inactivatedBy = $arr["inactivatedBy"];
        }
        if (array_key_exists("activated", $arr))
        {
            $result->activated = new DateTime($arr["activated"]);
        }
        if (array_key_exists("activatedBy", $arr))
        {
            $result->activatedBy = $arr["activatedBy"];
        }
        if (array_key_exists("archived", $arr))
        {
            $result->archived = new DateTime($arr["archived"]);
        }
        if (array_key_exists("archivedBy", $arr))
        {
            $result->archivedBy = $arr["archivedBy"];
        }
        return $result;
    }
    
    function setInactivated(?DateTime $inactivated)
    {
        $this->inactivated = $inactivated;
        return $this;
    }
    
    function setInactivatedBy(?string $inactivatedBy)
    {
        $this->inactivatedBy = $inactivatedBy;
        return $this;
    }
    
    function setActivated(?DateTime $activated)
    {
        $this->activated = $activated;
        return $this;
    }
    
    function setActivatedBy(?string $activatedBy)
    {
        $this->activatedBy = $activatedBy;
        return $this;
    }
    
    function setArchived(?DateTime $archived)
    {
        $this->archived = $archived;
        return $this;
    }
    
    function setArchivedBy(?string $archivedBy)
    {
        $this->archivedBy = $archivedBy;
        return $this;
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
        if (isset($this->inactivated))
        {
            $result["inactivated"] = $this->inactivated->format(DATE_ATOM);
        }
        if (isset($this->inactivatedBy))
        {
            $result["inactivatedBy"] = $this->inactivatedBy;
        }
        if (isset($this->activated))
        {
            $result["activated"] = $this->activated->format(DATE_ATOM);
        }
        if (isset($this->activatedBy))
        {
            $result["activatedBy"] = $this->activatedBy;
        }
        if (isset($this->archived))
        {
            $result["archived"] = $this->archived->format(DATE_ATOM);
        }
        if (isset($this->archivedBy))
        {
            $result["archivedBy"] = $this->archivedBy;
        }
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
