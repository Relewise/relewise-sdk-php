<?php declare(strict_types=1);

namespace Relewise\Models;

/** Indicates that some property should change by decreasing in value. */
class Decrease
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Changes.Decrease, Relewise.Client";
    public static function create() : Decrease
    {
        $result = new Decrease();
        return $result;
    }
    public static function hydrate(array $arr) : Decrease
    {
        $result = new Decrease();
        return $result;
    }
}
