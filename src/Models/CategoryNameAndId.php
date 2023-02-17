<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryNameAndId
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryNameAndId, Relewise.Client";
    public string $id;
    public ?Multilingual $displayName;
    public static function create(string $id, ?Multilingual $displayName = Null) : CategoryNameAndId
    {
        $result = new CategoryNameAndId();
        $result->id = $id;
        $result->displayName = $displayName;
        return $result;
    }
    public static function hydrate(array $arr) : CategoryNameAndId
    {
        $result = new CategoryNameAndId();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        return $result;
    }
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDisplayName(?Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}
