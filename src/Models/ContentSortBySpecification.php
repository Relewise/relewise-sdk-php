<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentSortBySpecification
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Content.ContentSortBySpecification, Relewise.Client";
    public ContentSorting $value;
    public static function create() : ContentSortBySpecification
    {
        $result = new ContentSortBySpecification();
        return $result;
    }
    public static function hydrate(array $arr) : ContentSortBySpecification
    {
        $result = new ContentSortBySpecification();
        if (array_key_exists("value", $arr))
        {
            $result->value = ContentSorting::hydrate($arr["value"]);
        }
        return $result;
    }
    function setValue(ContentSorting $value)
    {
        $this->value = $value;
        return $this;
    }
}
