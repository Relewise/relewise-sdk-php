<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteSynonymsResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.DeleteSynonymsResponse, Relewise.Client";
    public static function create() : DeleteSynonymsResponse
    {
        $result = new DeleteSynonymsResponse();
        return $result;
    }
    public static function hydrate(array $arr) : DeleteSynonymsResponse
    {
        $result = TimedResponse::hydrateBase(new DeleteSynonymsResponse(), $arr);
        return $result;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
