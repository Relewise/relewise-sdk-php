<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandNameAndIdResult
{
    public string $id;
    public string $displayName;
    public static function create(string $id, string $displayName) : BrandNameAndIdResult
    {
        $result = new BrandNameAndIdResult();
        $result->id = $id;
        $result->displayName = $displayName;
        return $result;
    }
    public static function hydrate(array $arr) : BrandNameAndIdResult
    {
        $result = new BrandNameAndIdResult();
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
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}
