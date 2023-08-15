<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** A category segment, containing the id and display name(s) of an individual category */
class CategoryNameAndId
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryNameAndId, Relewise.Client";
    public string $id;
    public ?Multilingual $displayName;
    /**
     * The id and name of a category segment
     * @param string $id The ID of the category (Which is generally very unlikely to change in the future)
     * @param ?Multilingual $displayName The Display name of the category (More likely to change in the future)
     */
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
     * @param ?Multilingual $displayName new value.
     */
    function setDisplayName(?Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}
