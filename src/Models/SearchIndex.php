<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchIndex
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.SearchIndex, Relewise.Client";
    public string $id;
    public string $description;
    public bool $enabled;
    public bool $isDefault;
    public DateTime $created;
    public string $createdBy;
    public DateTime $modified;
    public string $modifiedBy;
    public IndexConfiguration $configuration;
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
        return $result;
    }
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets description to a new value.
     * @param string $description new value.
     */
    function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Sets enabled to a new value.
     * @param bool $enabled new value.
     */
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * Sets isDefault to a new value.
     * @param bool $isDefault new value.
     */
    function setIsDefault(bool $isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }
    /**
     * Sets created to a new value.
     * @param DateTime $created new value.
     */
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    /**
     * Sets createdBy to a new value.
     * @param string $createdBy new value.
     */
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * Sets modified to a new value.
     * @param DateTime $modified new value.
     */
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    /**
     * Sets configuration to a new value.
     * @param IndexConfiguration $configuration new value.
     */
    function setConfiguration(IndexConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
}
