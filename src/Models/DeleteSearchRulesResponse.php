<?php declare(strict_types=1);

namespace Relewise\Models;

class DeleteSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.DeleteSearchRulesResponse, Relewise.Client";
    
    public static function create() : DeleteSearchRulesResponse
    {
        $result = new DeleteSearchRulesResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : DeleteSearchRulesResponse
    {
        $result = TimedResponse::hydrateBase(new DeleteSearchRulesResponse(), $arr);
        return $result;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
