<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchIndexesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SearchIndexesRequest, Relewise.Client";
    public static function create() : SearchIndexesRequest
    {
        $result = new SearchIndexesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : SearchIndexesRequest
    {
        $result = LicensedRequest::hydrateBase(new SearchIndexesRequest(), $arr);
        return $result;
    }
}
