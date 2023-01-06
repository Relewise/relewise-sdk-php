<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategorySearchSettings extends SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ProductCategorySearchSettings, Relewise.Client";
    public ?SelectedProductCategoryPropertiesSettings $selectedCategoryProperties;
    public RecommendationSettings $recommendations;
    public static function create() : ProductCategorySearchSettings
    {
        $result = new ProductCategorySearchSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategorySearchSettings
    {
        $result = SearchSettings::hydrateBase(new ProductCategorySearchSettings(), $arr);
        if (array_key_exists("selectedCategoryProperties", $arr))
        {
            $result->selectedCategoryProperties = SelectedProductCategoryPropertiesSettings::hydrate($arr["selectedCategoryProperties"]);
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = RecommendationSettings::hydrate($arr["recommendations"]);
        }
        return $result;
    }
    function withSelectedCategoryProperties(?SelectedProductCategoryPropertiesSettings $selectedCategoryProperties)
    {
        $this->selectedCategoryProperties = $selectedCategoryProperties;
        return $this;
    }
    function withRecommendations(RecommendationSettings $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
}
