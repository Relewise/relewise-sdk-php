<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RecommendPopularSearchTermSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.RecommendPopularSearchTermSettings, Relewise.Client";
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
    /**
     * Sets targetEntityTypes to a new value.
     * @param ?EntityType[] $targetEntityTypes new value.
     */
    function setTargetEntityTypes(EntityType ... $targetEntityTypes)
    {
        $this->targetEntityTypes = $targetEntityTypes;
        return $this;
    }
    /**
     * Sets targetEntityTypes to a new value from an array.
     * @param ?EntityType[] $targetEntityTypes new value.
     */
    function setTargetEntityTypesFromArray(array $targetEntityTypes)
    {
        $this->targetEntityTypes = $targetEntityTypes;
        return $this;
    }
    /**
     * Adds a new element to targetEntityTypes.
     * @param EntityType $targetEntityTypes new element.
     */
    function addToTargetEntityTypes(EntityType $targetEntityTypes)
    {
        if (!isset($this->targetEntityTypes))
        {
            $this->targetEntityTypes = array();
        }
        array_push($this->targetEntityTypes, $targetEntityTypes);
        return $this;
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
}
