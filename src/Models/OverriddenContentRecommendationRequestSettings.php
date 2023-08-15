<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class OverriddenContentRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.OverriddenContentRecommendationRequestSettings, Relewise.Client";
    public ?int $numberOfRecommendations;
    public ?bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public ?bool $allowReplacingOfRecentlyShownRecommendations;
    public OverriddenSelectedContentPropertiesSettings $selectedContentProperties;
    public ?bool $prioritizeDiversityBetweenRequests;
    public static function create() : OverriddenContentRecommendationRequestSettings
    {
        $result = new OverriddenContentRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : OverriddenContentRecommendationRequestSettings
    {
        $result = new OverriddenContentRecommendationRequestSettings();
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
            $result->selectedContentProperties = OverriddenSelectedContentPropertiesSettings::hydrate($arr["selectedContentProperties"]);
        }
        if (array_key_exists("prioritizeDiversityBetweenRequests", $arr))
        {
            $result->prioritizeDiversityBetweenRequests = $arr["prioritizeDiversityBetweenRequests"];
        }
        return $result;
    }
    /**
     * Sets numberOfRecommendations to a new value.
     * @param ?int $numberOfRecommendations new value.
     */
    function setNumberOfRecommendations(?int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    /**
     * Sets allowFillIfNecessaryToReachNumberOfRecommendations to a new value.
     * @param ?bool $allowFillIfNecessaryToReachNumberOfRecommendations new value.
     */
    function setAllowFillIfNecessaryToReachNumberOfRecommendations(?bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    /**
     * Sets allowReplacingOfRecentlyShownRecommendations to a new value.
     * @param ?bool $allowReplacingOfRecentlyShownRecommendations new value.
     */
    function setAllowReplacingOfRecentlyShownRecommendations(?bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    /**
     * Sets selectedContentProperties to a new value.
     * @param OverriddenSelectedContentPropertiesSettings $selectedContentProperties new value.
     */
    function setSelectedContentProperties(OverriddenSelectedContentPropertiesSettings $selectedContentProperties)
    {
        $this->selectedContentProperties = $selectedContentProperties;
        return $this;
    }
    /**
     * Sets prioritizeDiversityBetweenRequests to a new value.
     * @param ?bool $prioritizeDiversityBetweenRequests new value.
     */
    function setPrioritizeDiversityBetweenRequests(?bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
}
