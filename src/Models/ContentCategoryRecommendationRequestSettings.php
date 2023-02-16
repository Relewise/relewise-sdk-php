<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentCategoryRecommendationRequestSettings, Relewise.Client";
    public int $numberOfRecommendations;
    public bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public bool $allowReplacingOfRecentlyShownRecommendations;
    public bool $prioritizeDiversityBetweenRequests;
    public SelectedContentCategoryPropertiesSettings $selectedContentCategoryProperties;
    public static function create() : ContentCategoryRecommendationRequestSettings
    {
        $result = new ContentCategoryRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryRecommendationRequestSettings
    {
        $result = new ContentCategoryRecommendationRequestSettings();
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
        if (array_key_exists("prioritizeDiversityBetweenRequests", $arr))
        {
            $result->prioritizeDiversityBetweenRequests = $arr["prioritizeDiversityBetweenRequests"];
        }
        if (array_key_exists("selectedContentCategoryProperties", $arr))
        {
            $result->selectedContentCategoryProperties = SelectedContentCategoryPropertiesSettings::hydrate($arr["selectedContentCategoryProperties"]);
        }
        return $result;
    }
    function setNumberOfRecommendations(int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    function setAllowFillIfNecessaryToReachNumberOfRecommendations(bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    function setAllowReplacingOfRecentlyShownRecommendations(bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    function setPrioritizeDiversityBetweenRequests(bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
    function setSelectedContentCategoryProperties(SelectedContentCategoryPropertiesSettings $selectedContentCategoryProperties)
    {
        $this->selectedContentCategoryProperties = $selectedContentCategoryProperties;
        return $this;
    }
}
