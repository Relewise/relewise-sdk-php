<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategorySearchSettings extends SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ContentCategorySearchSettings, Relewise.Client";
    public ?int $numberOfRecommendations;
    
    public ?bool $onlyIncludeRecommendationsForEmptyResults;
    
    public static function create() : ContentCategorySearchSettings
    {
        $result = new ContentCategorySearchSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategorySearchSettings
    {
        $result = SearchSettings::hydrateBase(new ContentCategorySearchSettings(), $arr);
        if (array_key_exists("numberOfRecommendations", $arr))
        {
            $result->numberOfRecommendations = $arr["numberOfRecommendations"];
        }
        if (array_key_exists("onlyIncludeRecommendationsForEmptyResults", $arr))
        {
            $result->onlyIncludeRecommendationsForEmptyResults = $arr["onlyIncludeRecommendationsForEmptyResults"];
        }
        return $result;
    }
    
    function setNumberOfRecommendations(?int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    
    function setOnlyIncludeRecommendationsForEmptyResults(?bool $onlyIncludeRecommendationsForEmptyResults)
    {
        $this->onlyIncludeRecommendationsForEmptyResults = $onlyIncludeRecommendationsForEmptyResults;
        return $this;
    }
}
