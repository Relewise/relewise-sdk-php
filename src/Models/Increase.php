<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** Indicates that some property should change by increasing in value. */
class Increase
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Changes.Increase, Relewise.Client";
    public static function create() : Increase
    {
        $result = new Increase();
        return $result;
    }
    public static function hydrate(array $arr) : Increase
    {
        $result = new Increase();
        return $result;
    }
}
