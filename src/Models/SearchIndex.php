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
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    function setIsDefault(bool $isDefault)
    {
        $this->isDefault = $isDefault;
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
    function setConfiguration(IndexConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
}
