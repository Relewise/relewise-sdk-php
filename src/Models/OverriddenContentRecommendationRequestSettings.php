<?php declare(strict_types=1);

namespace Relewise\Models;

class OverriddenContentRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.OverriddenContentRecommendationRequestSettings, Relewise.Client";
    public ?int $numberOfRecommendations;
    public ?bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public ?bool $allowReplacingOfRecentlyShownRecommendations;
    public OverriddenSelectedContentPropertiesSettings $selectedContentProperties;
    public ?bool $prioritizeDiversityBetweenRequests;
    public ?int $prioritizeResultsNotRecommendedWithinSeconds;
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
        if (array_key_exists("prioritizeResultsNotRecommendedWithinSeconds", $arr))
        {
            $result->prioritizeResultsNotRecommendedWithinSeconds = $arr["prioritizeResultsNotRecommendedWithinSeconds"];
        }
        return $result;
    }
    function setNumberOfRecommendations(?int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    function setAllowFillIfNecessaryToReachNumberOfRecommendations(?bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    function setAllowReplacingOfRecentlyShownRecommendations(?bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    function setSelectedContentProperties(OverriddenSelectedContentPropertiesSettings $selectedContentProperties)
    {
        $this->selectedContentProperties = $selectedContentProperties;
        return $this;
    }
    function setPrioritizeDiversityBetweenRequests(?bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
    function setPrioritizeResultsNotRecommendedWithinSeconds(?int $prioritizeResultsNotRecommendedWithinSeconds)
    {
        $this->prioritizeResultsNotRecommendedWithinSeconds = $prioritizeResultsNotRecommendedWithinSeconds;
        return $this;
    }
}
