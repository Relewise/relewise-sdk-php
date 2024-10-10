<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantSearchSettings
{
    /** @deprecated Use ProductSearchSettings.ResultConstraint instead */
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
    
    /** @deprecated Use ProductSearchSettings.ResultConstraint instead */
    function setExcludeResultsWithoutVariant(bool $excludeResultsWithoutVariant)
    {
        $this->excludeResultsWithoutVariant = $excludeResultsWithoutVariant;
        return $this;
    }
}
