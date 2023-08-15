<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantSearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.VariantSearchSettings, Relewise.Client";
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
    /**
     * Sets excludeResultsWithoutVariant to a new value.
     * @param bool $excludeResultsWithoutVariant new value.
     */
    function setExcludeResultsWithoutVariant(bool $excludeResultsWithoutVariant)
    {
        $this->excludeResultsWithoutVariant = $excludeResultsWithoutVariant;
        return $this;
    }
}
