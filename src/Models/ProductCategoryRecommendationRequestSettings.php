<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductCategoryRecommendationRequestSettings, Relewise.Client";
    public int $numberOfRecommendations;
    public bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public bool $allowReplacingOfRecentlyShownRecommendations;
    public bool $prioritizeDiversityBetweenRequests;
    public SelectedProductCategoryPropertiesSettings $selectedProductCategoryProperties;
    public static function create() : ProductCategoryRecommendationRequestSettings
    {
        $result = new ProductCategoryRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryRecommendationRequestSettings
    {
        $result = new ProductCategoryRecommendationRequestSettings();
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
        if (array_key_exists("selectedProductCategoryProperties", $arr))
        {
            $result->selectedProductCategoryProperties = SelectedProductCategoryPropertiesSettings::hydrate($arr["selectedProductCategoryProperties"]);
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
     * Sets selectedProductCategoryProperties to a new value.
     * @param SelectedProductCategoryPropertiesSettings $selectedProductCategoryProperties new value.
     */
    function setSelectedProductCategoryProperties(SelectedProductCategoryPropertiesSettings $selectedProductCategoryProperties)
    {
        $this->selectedProductCategoryProperties = $selectedProductCategoryProperties;
        return $this;
    }
}
