<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines what Score properties will be included for the Score. If none of the properties are selected then the Score will be null. */
class SelectedScorePropertiesSettings
{
    /** Whether Relevance should be included in the result. */
    public bool $relevance;
    /** Whether Adjusted should be included in the result. */
    public bool $adjusted;
    
    public static function create() : SelectedScorePropertiesSettings
    {
        $result = new SelectedScorePropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : SelectedScorePropertiesSettings
    {
        $result = new SelectedScorePropertiesSettings();
        if (array_key_exists("relevance", $arr))
        {
            $result->relevance = $arr["relevance"];
        }
        if (array_key_exists("adjusted", $arr))
        {
            $result->adjusted = $arr["adjusted"];
        }
        return $result;
    }
    
    /** Whether Relevance should be included in the result. */
    function setRelevance(bool $relevance)
    {
        $this->relevance = $relevance;
        return $this;
    }
    
    /** Whether Adjusted should be included in the result. */
    function setAdjusted(bool $adjusted)
    {
        $this->adjusted = $adjusted;
        return $this;
    }
}
