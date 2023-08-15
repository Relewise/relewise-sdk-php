<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentRecommendationRequestSettings, Relewise.Client";
    public int $numberOfRecommendations;
    public bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public bool $allowReplacingOfRecentlyShownRecommendations;
    public ?SelectedContentPropertiesSettings $selectedContentProperties;
    public bool $prioritizeDiversityBetweenRequests;
    public static function create() : ContentRecommendationRequestSettings
    {
        $result = new ContentRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ContentRecommendationRequestSettings
    {
        $result = new ContentRecommendationRequestSettings();
        if (array_key_exists("numberOfRecommendations", $arr))
        {
            $result->numberOfRecommendations = $arr["numberOfRecommendations"];
        }
        if (array_key_exists("allowFillIfNecessaryToReachNumberOfRecommendations", $arr))
        {
            $result->allowFillIfNecessaryToReachNumberOfRecommendations = $arr["allowFillIfNecessaryToReachNumberOfRecommendations"];
        }
        if (array_key_exists("allowReplacingOfRecentlyShownRecommendations", $arr))
        {
            $result->allowReplacingOfRecentlyShownRecommendations = $arr["allowReplacingOfRecentlyShownRecommendations"];
        }
        if (array_key_exists("selectedContentProperties", $arr))
        {
            $result->selectedContentProperties = SelectedContentPropertiesSettings::hydrate($arr["selectedContentProperties"]);
        }
        if (array_key_exists("prioritizeDiversityBetweenRequests", $arr))
        {
            $result->prioritizeDiversityBetweenRequests = $arr["prioritizeDiversityBetweenRequests"];
        }
        return $result;
    }
    /**
     * Sets numberOfRecommendations to a new value.
     * @param int $numberOfRecommendations new value.
     */
    function setNumberOfRecommendations(int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    /**
     * Sets allowFillIfNecessaryToReachNumberOfRecommendations to a new value.
     * @param bool $allowFillIfNecessaryToReachNumberOfRecommendations new value.
     */
    function setAllowFillIfNecessaryToReachNumberOfRecommendations(bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    /**
     * Sets allowReplacingOfRecentlyShownRecommendations to a new value.
     * @param bool $allowReplacingOfRecentlyShownRecommendations new value.
     */
    function setAllowReplacingOfRecentlyShownRecommendations(bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
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
     * Sets prioritizeDiversityBetweenRequests to a new value.
     * @param bool $prioritizeDiversityBetweenRequests new value.
     */
    function setPrioritizeDiversityBetweenRequests(bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
}
