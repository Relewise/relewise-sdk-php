<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets selectedContentProperties to a new value.
     * @param ?SelectedContentPropertiesSettings $selectedContentProperties new value.
     */
    function setSelectedContentProperties(?SelectedContentPropertiesSettings $selectedContentProperties)
    {
        $this->selectedContentProperties = $selectedContentProperties;
        return $this;
    }
    /**
     * Sets recommendations to a new value.
     * @param RecommendationSettings $recommendations new value.
     */
    function setRecommendations(RecommendationSettings $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
}
