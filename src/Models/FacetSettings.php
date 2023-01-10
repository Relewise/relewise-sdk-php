<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class FacetSettings
{
    public bool $alwaysIncludeSelectedInAvailable;
    public static function create() : FacetSettings
    {
        $result = new FacetSettings();
        return $result;
    }
    public static function hydrate(array $arr) : FacetSettings
    {
        $result = new FacetSettings();
        if (array_key_exists("alwaysIncludeSelectedInAvailable", $arr))
        {
            $result->alwaysIncludeSelectedInAvailable = $arr["alwaysIncludeSelectedInAvailable"];
        }
        return $result;
    }
    function setAlwaysIncludeSelectedInAvailable(bool $alwaysIncludeSelectedInAvailable)
    {
        $this->alwaysIncludeSelectedInAvailable = $alwaysIncludeSelectedInAvailable;
        return $this;
    }
}
