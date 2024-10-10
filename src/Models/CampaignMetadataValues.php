<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class CampaignMetadataValues extends MetadataValues implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Campaign+MetadataValues, Relewise.Client";
    public ?DateTime $proposed;
    public ?string $proposedBy;
    public ?DateTime $approved;
    public ?string $approvedBy;
    public ?DateTime $archived;
    public ?string $archivedBy;
    
    public static function create() : CampaignMetadataValues
    {
        $result = new CampaignMetadataValues();
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignMetadataValues
    {
        $result = MetadataValues::hydrateBase(new CampaignMetadataValues(), $arr);
        if (array_key_exists("proposed", $arr))
        {
            $result->proposed = new DateTime($arr["proposed"]);
        }
        if (array_key_exists("proposedBy", $arr))
        {
            $result->proposedBy = $arr["proposedBy"];
        }
        if (array_key_exists("approved", $arr))
        {
            $result->approved = new DateTime($arr["approved"]);
        }
        if (array_key_exists("approvedBy", $arr))
        {
            $result->approvedBy = $arr["approvedBy"];
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
    
    function setProposed(?DateTime $proposed)
    {
        $this->proposed = $proposed;
        return $this;
    }
    
    function setProposedBy(?string $proposedBy)
    {
        $this->proposedBy = $proposedBy;
        return $this;
    }
    
    function setApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    
    function setApprovedBy(?string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
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
        if (isset($this->proposed))
        {
            $result["proposed"] = $this->proposed->format(DATE_ATOM);
        }
        if (isset($this->proposedBy))
        {
            $result["proposedBy"] = $this->proposedBy;
        }
        if (isset($this->approved))
        {
            $result["approved"] = $this->approved->format(DATE_ATOM);
        }
        if (isset($this->approvedBy))
        {
            $result["approvedBy"] = $this->approvedBy;
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
