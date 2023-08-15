<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.BrandIndexConfiguration, Relewise.Client";
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
    /**
     * Sets id to a new value.
     * @param FieldIndexConfiguration $id new value.
     */
    function setId(FieldIndexConfiguration $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets displayName to a new value.
     * @param FieldIndexConfiguration $displayName new value.
     */
    function setDisplayName(FieldIndexConfiguration $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}
