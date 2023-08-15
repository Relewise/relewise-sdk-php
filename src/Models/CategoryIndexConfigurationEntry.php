<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryIndexConfigurationEntry
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.CategoryIndexConfigurationEntry, Relewise.Client";
    public FieldIndexConfiguration $id;
    public FieldIndexConfiguration $displayName;
    public DataIndexConfiguration $data;
    public static function create() : CategoryIndexConfigurationEntry
    {
        $result = new CategoryIndexConfigurationEntry();
        return $result;
    }
    public static function hydrate(array $arr) : CategoryIndexConfigurationEntry
    {
        $result = new CategoryIndexConfigurationEntry();
        if (array_key_exists("id", $arr))
        {
            $result->id = FieldIndexConfiguration::hydrate($arr["id"]);
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = FieldIndexConfiguration::hydrate($arr["displayName"]);
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = DataIndexConfiguration::hydrate($arr["data"]);
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
    /**
     * Sets data to a new value.
     * @param DataIndexConfiguration $data new value.
     */
    function setData(DataIndexConfiguration $data)
    {
        $this->data = $data;
        return $this;
    }
}
