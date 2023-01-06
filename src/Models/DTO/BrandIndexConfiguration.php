<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandIndexConfiguration
{
    public FieldIndexConfiguration $id;
    public FieldIndexConfiguration $displayName;
    public static function create() : BrandIndexConfiguration
    {
        $result = new BrandIndexConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : BrandIndexConfiguration
    {
        $result = new BrandIndexConfiguration();
        if (array_key_exists("id", $arr))
        {
            $result->id = FieldIndexConfiguration::hydrate($arr["id"]);
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = FieldIndexConfiguration::hydrate($arr["displayName"]);
        }
        return $result;
    }
    function setId(FieldIndexConfiguration $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDisplayName(FieldIndexConfiguration $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}
