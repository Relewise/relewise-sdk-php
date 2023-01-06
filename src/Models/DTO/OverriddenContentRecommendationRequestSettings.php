<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class OverriddenContentRecommendationRequestSettings
{
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
    function withNumberOfRecommendations(?int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    function withAllowFillIfNecessaryToReachNumberOfRecommendations(?bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    function withAllowReplacingOfRecentlyShownRecommendations(?bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    function withSelectedContentProperties(OverriddenSelectedContentPropertiesSettings $selectedContentProperties)
    {
        $this->selectedContentProperties = $selectedContentProperties;
        return $this;
    }
    function withPrioritizeDiversityBetweenRequests(?bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
}
