<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class FieldIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.FieldIndexConfiguration, Relewise.Client";
    public bool $included;
    public int $weight;
    public PredictionSourceType $predictionSourceType;
    public ?Parser $parser;
    public static function create(bool $included, int $weight, PredictionSourceType $predictionSourceType) : FieldIndexConfiguration
    {
        $result = new FieldIndexConfiguration();
        $result->included = $included;
        $result->weight = $weight;
        $result->predictionSourceType = $predictionSourceType;
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
}
