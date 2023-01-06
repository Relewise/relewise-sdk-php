<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentSearchSettings extends SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ContentSearchSettings, Relewise.Client";
    public ?SelectedContentPropertiesSettings $selectedContentProperties;
    public RecommendationSettings $recommendations;
    public static function create() : ContentSearchSettings
    {
        $result = new ContentSearchSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ContentSearchSettings
    {
        $result = SearchSettings::hydrateBase(new ContentSearchSettings(), $arr);
        if (array_key_exists("selectedContentProperties", $arr))
        {
            $result->selectedContentProperties = SelectedContentPropertiesSettings::hydrate($arr["selectedContentProperties"]);
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = RecommendationSettings::hydrate($arr["recommendations"]);
        }
        return $result;
    }
    function withSelectedContentProperties(?SelectedContentPropertiesSettings $selectedContentProperties)
    {
        $this->selectedContentProperties = $selectedContentProperties;
        return $this;
    }
    function withRecommendations(RecommendationSettings $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
}
