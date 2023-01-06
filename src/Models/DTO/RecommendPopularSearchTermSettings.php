<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RecommendPopularSearchTermSettings
{
    public ?array $targetEntityTypes;
    public int $numberOfRecommendations;
    public static function create() : RecommendPopularSearchTermSettings
    {
        $result = new RecommendPopularSearchTermSettings();
        return $result;
    }
    public static function hydrate(array $arr) : RecommendPopularSearchTermSettings
    {
        $result = new RecommendPopularSearchTermSettings();
        if (array_key_exists("targetEntityTypes", $arr))
        {
            $result->targetEntityTypes = array();
            foreach($arr["targetEntityTypes"] as &$value)
            {
                array_push($result->targetEntityTypes, EntityType::from($value));
            }
        }
        if (array_key_exists("numberOfRecommendations", $arr))
        {
            $result->numberOfRecommendations = $arr["numberOfRecommendations"];
        }
        return $result;
    }
    function withTargetEntityTypes(EntityType ... $targetEntityTypes)
    {
        $this->targetEntityTypes = $targetEntityTypes;
        return $this;
    }
    function withNumberOfRecommendations(int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
}
