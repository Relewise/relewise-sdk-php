<?php declare(strict_types=1);

namespace Relewise\Models;

class FieldIndexConfiguration
{
    public bool $included;
    public int $weight;
    /** @deprecated Use PredictionConfiguration instead */
    public PredictionSourceType $predictionSourceType;
    public ?Parser $parser;
    public ?MatchTypeSettings $matchTypeSettings;
    public ?PredictionConfiguration $predictionConfiguration;
    
    public static function create(bool $included, int $weight, PredictionConfiguration $predictionConfiguration, Parser $parser, ?MatchTypeSettings $matchTypeSettings = Null) : FieldIndexConfiguration
    {
        $result = new FieldIndexConfiguration();
        $result->included = $included;
        $result->weight = $weight;
        $result->predictionConfiguration = $predictionConfiguration;
        $result->parser = $parser;
        $result->matchTypeSettings = $matchTypeSettings;
        return $result;
    }
    
    public static function hydrate(array $arr) : FieldIndexConfiguration
    {
        $result = new FieldIndexConfiguration();
        if (array_key_exists("included", $arr))
        {
            $result->included = $arr["included"];
        }
        if (array_key_exists("weight", $arr))
        {
            $result->weight = $arr["weight"];
        }
        if (array_key_exists("predictionSourceType", $arr))
        {
            $result->predictionSourceType = PredictionSourceType::from($arr["predictionSourceType"]);
        }
        if (array_key_exists("parser", $arr))
        {
            $result->parser = Parser::hydrate($arr["parser"]);
        }
        if (array_key_exists("matchTypeSettings", $arr))
        {
            $result->matchTypeSettings = MatchTypeSettings::hydrate($arr["matchTypeSettings"]);
        }
        if (array_key_exists("predictionConfiguration", $arr))
        {
            $result->predictionConfiguration = PredictionConfiguration::hydrate($arr["predictionConfiguration"]);
        }
        return $result;
    }
    
    function setIncluded(bool $included)
    {
        $this->included = $included;
        return $this;
    }
    
    function setWeight(int $weight)
    {
        $this->weight = $weight;
        return $this;
    }
    
    /** @deprecated Use PredictionConfiguration instead */
    function setPredictionSourceType(PredictionSourceType $predictionSourceType)
    {
        $this->predictionSourceType = $predictionSourceType;
        return $this;
    }
    
    function setParser(?Parser $parser)
    {
        $this->parser = $parser;
        return $this;
    }
    
    function setMatchTypeSettings(?MatchTypeSettings $matchTypeSettings)
    {
        $this->matchTypeSettings = $matchTypeSettings;
        return $this;
    }
    
    function setPredictionConfiguration(?PredictionConfiguration $predictionConfiguration)
    {
        $this->predictionConfiguration = $predictionConfiguration;
        return $this;
    }
}
