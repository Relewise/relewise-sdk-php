<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchTermPredictionSettings extends SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.SearchTermPredictionSettings, Relewise.Client";
    public ?array $targetEntityTypes;
    public static function create() : SearchTermPredictionSettings
    {
        $result = new SearchTermPredictionSettings();
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermPredictionSettings
    {
        $result = SearchSettings::hydrateBase(new SearchTermPredictionSettings(), $arr);
        if (array_key_exists("targetEntityTypes", $arr))
        {
            $result->targetEntityTypes = array();
            foreach($arr["targetEntityTypes"] as &$value)
            {
                array_push($result->targetEntityTypes, EntityType::from($value));
            }
        }
        return $result;
    }
    function setTargetEntityTypes(EntityType ... $targetEntityTypes)
    {
        $this->targetEntityTypes = $targetEntityTypes;
        return $this;
    }
}
