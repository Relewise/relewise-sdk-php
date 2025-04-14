<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class SearchIndex implements JsonSerializable
{
    /** A unique identifier for the search index. */
    public string $id;
    /** A descriptive text providing details about the search index. */
    public string $description;
    /** Indicates whether the search index is currently enabled. */
    public bool $enabled;
    /** Indicates whether the search index is marked as the default. */
    public bool $isDefault;
    /** The timestamp when the search index was created. This property is set server-side during creation. Any value sent from the client will be ignored. */
    public DateTime $created;
    /** The identifier of the user who created the search index. */
    public string $createdBy;
    /** The timestamp when the search index was last modified. This property is set server-side during modification. Any value sent from the client will be ignored. */
    public DateTime $modified;
    /** The identifier of the user who last modified the search index. */
    public string $modifiedBy;
    /** The configuration settings associated with the search index. */
    public IndexConfiguration $configuration;
    /** Details about the current rebuild status of the index These values are set server side, any values set from client is ignored */
    public RebuildStatus $rebuildStatus;
    
    public static function create(string $id, string $description, bool $isDefault, bool $enabled = true) : SearchIndex
    {
        $result = new SearchIndex();
        $result->id = $id;
        $result->description = $description;
        $result->isDefault = $isDefault;
        $result->enabled = $enabled;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchIndex
    {
        $result = new SearchIndex();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("description", $arr))
        {
            $result->description = $arr["description"];
        }
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("isDefault", $arr))
        {
            $result->isDefault = $arr["isDefault"];
        }
        if (array_key_exists("created", $arr))
        {
            $result->created = new DateTime($arr["created"]);
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = new DateTime($arr["modified"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = IndexConfiguration::hydrate($arr["configuration"]);
        }
        if (array_key_exists("rebuildStatus", $arr))
        {
            $result->rebuildStatus = RebuildStatus::hydrate($arr["rebuildStatus"]);
        }
        return $result;
    }
    
    /** A unique identifier for the search index. */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    /** A descriptive text providing details about the search index. */
    function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    
    /** Indicates whether the search index is currently enabled. */
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    /** Indicates whether the search index is marked as the default. */
    function setIsDefault(bool $isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }
    
    /** The timestamp when the search index was created. This property is set server-side during creation. Any value sent from the client will be ignored. */
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    
    /** The identifier of the user who created the search index. */
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    
    /** The timestamp when the search index was last modified. This property is set server-side during modification. Any value sent from the client will be ignored. */
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    
    /** The identifier of the user who last modified the search index. */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    
    /** The configuration settings associated with the search index. */
    function setConfiguration(IndexConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
    
    /** Details about the current rebuild status of the index These values are set server side, any values set from client is ignored */
    function setRebuildStatus(RebuildStatus $rebuildStatus)
    {
        $this->rebuildStatus = $rebuildStatus;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->id))
        {
            $result["id"] = $this->id;
        }
        if (isset($this->description))
        {
            $result["description"] = $this->description;
        }
        if (isset($this->enabled))
        {
            $result["enabled"] = $this->enabled;
        }
        if (isset($this->isDefault))
        {
            $result["isDefault"] = $this->isDefault;
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
        if (isset($this->configuration))
        {
            $result["configuration"] = $this->configuration;
        }
        if (isset($this->rebuildStatus))
        {
            $result["rebuildStatus"] = $this->rebuildStatus;
        }
        return $result;
    }
}
