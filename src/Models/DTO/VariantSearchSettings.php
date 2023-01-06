<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantSearchSettings
{
    public bool $excludeResultsWithoutVariant;
    public static function create() : VariantSearchSettings
    {
        $result = new VariantSearchSettings();
        return $result;
    }
    public static function hydrate(array $arr) : VariantSearchSettings
    {
        $result = new VariantSearchSettings();
        if (array_key_exists("excludeResultsWithoutVariant", $arr))
        {
            $result->excludeResultsWithoutVariant = $arr["excludeResultsWithoutVariant"];
        }
        return $result;
    }
    function setExcludeResultsWithoutVariant(bool $excludeResultsWithoutVariant)
    {
        $this->excludeResultsWithoutVariant = $excludeResultsWithoutVariant;
        return $this;
    }
}
