<?php declare(strict_types=1);

namespace Relewise\Models;

class RecommendationSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.RecommendationSettings, Relewise.Client";
    public ?int $take;
    public ?int $onlyIncludeRecommendationsWhenLessResultsThan;
    public static function create() : RecommendationSettings
    {
        $result = new RecommendationSettings();
        return $result;
    }
    public static function hydrate(array $arr) : RecommendationSettings
    {
        $result = new RecommendationSettings();
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
        if (array_key_exists("onlyIncludeRecommendationsWhenLessResultsThan", $arr))
        {
            $result->onlyIncludeRecommendationsWhenLessResultsThan = $arr["onlyIncludeRecommendationsWhenLessResultsThan"];
        }
        return $result;
    }
    function setTake(?int $take)
    {
        $this->take = $take;
        return $this;
    }
    function setOnlyIncludeRecommendationsWhenLessResultsThan(?int $onlyIncludeRecommendationsWhenLessResultsThan)
    {
        $this->onlyIncludeRecommendationsWhenLessResultsThan = $onlyIncludeRecommendationsWhenLessResultsThan;
        return $this;
    }
}
