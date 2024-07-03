<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class UserAssociatedCompanyResultDetails implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserAssociatedCompanyResultDetails, Relewise.Client";
    public string $id;
    public ?UserAssociatedCompanyResultDetails $parent;
    public ?array $data;
    public DateTime $createdUtc;
    public DateTime $lastAccessedUtc;
    public static function create(string $id) : UserAssociatedCompanyResultDetails
    {
        $result = new UserAssociatedCompanyResultDetails();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : UserAssociatedCompanyResultDetails
    {
        $result = new UserAssociatedCompanyResultDetails();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("parent", $arr))
        {
            $result->parent = UserAssociatedCompanyResultDetails::hydrate($arr["parent"]);
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("createdUtc", $arr))
        {
            $result->createdUtc = new DateTime($arr["createdUtc"]);
        }
        if (array_key_exists("lastAccessedUtc", $arr))
        {
            $result->lastAccessedUtc = new DateTime($arr["lastAccessedUtc"]);
        }
        return $result;
    }
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setParent(?UserAssociatedCompanyResultDetails $parent)
    {
        $this->parent = $parent;
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
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    function setLastAccessedUtc(DateTime $lastAccessedUtc)
    {
        $this->lastAccessedUtc = $lastAccessedUtc;
        return $this;
    }
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->id))
        {
            $result["id"] = $this->id;
        }
        if (isset($this->parent))
        {
            $result["parent"] = $this->parent;
        }
        if (isset($this->data))
        {
            $result["data"] = $this->data;
        }
        if (isset($this->createdUtc))
        {
            $result["createdUtc"] = $this->createdUtc->format(DATE_ATOM);
        }
        if (isset($this->lastAccessedUtc))
        {
            $result["lastAccessedUtc"] = $this->lastAccessedUtc->format(DATE_ATOM);
        }
        return $result;
    }
}
