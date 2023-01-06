<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchIndex
{
    public string $id;
    public string $description;
    public bool $enabled;
    public bool $isDefault;
    public DateTime $created;
    public string $createdBy;
    public DateTime $modified;
    public string $modifiedBy;
    public IndexConfiguration $configuration;
    public static function create(string $id, string $description, bool $isDefault) : SearchIndex
    {
        $result = new SearchIndex();
        $result->id = $id;
        $result->description = $description;
        $result->isDefault = $isDefault;
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
            $result->created = $arr["created"];
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = $arr["modified"];
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
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }
    function withEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    function withIsDefault(bool $isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }
    function withCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function withCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    function withModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withConfiguration(IndexConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
}
