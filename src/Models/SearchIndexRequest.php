<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchIndexRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SearchIndexRequest, Relewise.Client";
    
    public string $id;
    
    public static function create(string $id) : SearchIndexRequest
    {
        $result = new SearchIndexRequest();
        $result->id = $id;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchIndexRequest
    {
        $result = LicensedRequest::hydrateBase(new SearchIndexRequest(), $arr);
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        return $result;
    }
    
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
}
