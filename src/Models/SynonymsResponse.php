<?php declare(strict_types=1);

namespace Relewise\Models;

class SynonymsResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.SynonymsResponse, Relewise.Client";
    public array $values;
    public int $hits;
    public static function create(array $values, int $hits) : SynonymsResponse
    {
        $result = new SynonymsResponse();
        $result->values = $values;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : SynonymsResponse
    {
        $result = TimedResponse::hydrateBase(new SynonymsResponse(), $arr);
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, Synonym::hydrate($value));
            }
        }
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        return $result;
    }
    
    function setValues(Synonym ... $values)
    {
        $this->values = $values;
        return $this;
    }
    
    /** @param Synonym[] $values new value. */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    
    function addToValues(Synonym $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
    
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
