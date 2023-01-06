<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveSynonymsResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.SaveSynonymsResponse, Relewise.Client";
    public array $values;
    public static function create(Synonym ... $values) : SaveSynonymsResponse
    {
        $result = new SaveSynonymsResponse();
        $result->values = $values;
        return $result;
    }
    public static function hydrate(array $arr) : SaveSynonymsResponse
    {
        $result = TimedResponse::hydrateBase(new SaveSynonymsResponse(), $arr);
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, Synonym::hydrate($value));
            }
        }
        return $result;
    }
    function withValues(Synonym ... $values)
    {
        $this->values = $values;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}