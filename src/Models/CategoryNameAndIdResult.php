<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryNameAndIdResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryNameAndIdResult, Relewise.Client";
    public string $id;
    public string $displayName;
    public static function create(string $id, string $displayName) : CategoryNameAndIdResult
    {
        $result = new CategoryNameAndIdResult();
        $result->id = $id;
        $result->displayName = $displayName;
        return $result;
    }
    public static function hydrate(array $arr) : CategoryNameAndIdResult
    {
        $result = new CategoryNameAndIdResult();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
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
     * Sets displayName to a new value.
     * @param string $displayName new value.
     */
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}
