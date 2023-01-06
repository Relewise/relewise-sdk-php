<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveSearchIndexRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SaveSearchIndexRequest, Relewise.Client";
    public SearchIndex $index;
    public string $modifiedBy;
    public static function create(SearchIndex $index, string $modifiedBy) : SaveSearchIndexRequest
    {
        $result = new SaveSearchIndexRequest();
        $result->index = $index;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveSearchIndexRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveSearchIndexRequest(), $arr);
        if (array_key_exists("index", $arr))
        {
            $result->index = SearchIndex::hydrate($arr["index"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    function withIndex(SearchIndex $index)
    {
        $this->index = $index;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
