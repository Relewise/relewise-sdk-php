<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchIndexSelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.SearchIndexSelector, Relewise.Client";
    public string $id;
    const DEFAULT = Null;
    public static function create(string $id) : SearchIndexSelector
    {
        $result = new SearchIndexSelector();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : SearchIndexSelector
    {
        $result = new SearchIndexSelector();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
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
}
