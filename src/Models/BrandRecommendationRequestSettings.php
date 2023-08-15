<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.BrandRecommendationRequestSettings, Relewise.Client";
    public int $numberOfRecommendations;
    public bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public bool $allowReplacingOfRecentlyShownRecommendations;
    public bool $prioritizeDiversityBetweenRequests;
    public ?SelectedBrandPropertiesSettings $selectedBrandProperties;
    public static function create() : BrandRecommendationRequestSettings
    {
        $result = new BrandRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : BrandRecommendationRequestSettings
    {
        $result = new BrandRecommendationRequestSettings();
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
        if (array_key_exists("selectedBrandProperties", $arr))
        {
            $result->selectedBrandProperties = SelectedBrandPropertiesSettings::hydrate($arr["selectedBrandProperties"]);
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
     * Sets prioritizeDiversityBetweenRequests to a new value.
     * @param bool $prioritizeDiversityBetweenRequests new value.
     */
    function setPrioritizeDiversityBetweenRequests(bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
    /**
     * Sets selectedBrandProperties to a new value.
     * @param ?SelectedBrandPropertiesSettings $selectedBrandProperties new value.
     */
    function setSelectedBrandProperties(?SelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
        return $this;
    }
}
