<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SynonymsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SynonymsRequest, Relewise.Client";
    public SynonymsRequestSynonymSortingSorting $sorting;
    public int $take;
    public int $skip;
    public string $term;
    public ?bool $isApproved;
    public static function create() : SynonymsRequest
    {
        $result = new SynonymsRequest();
        return $result;
    }
    public static function hydrate(array $arr) : SynonymsRequest
    {
        $result = LicensedRequest::hydrateBase(new SynonymsRequest(), $arr);
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = SynonymsRequestSynonymSortingSorting::hydrate($arr["sorting"]);
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
        if (array_key_exists("skip", $arr))
        {
            $result->skip = $arr["skip"];
        }
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("isApproved", $arr))
        {
            $result->isApproved = $arr["isApproved"];
        }
        return $result;
    }
    function withSorting(SynonymsRequestSynonymSortingSorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    function withTake(int $take)
    {
        $this->take = $take;
        return $this;
    }
    function withSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    function withTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withIsApproved(?bool $isApproved)
    {
        $this->isApproved = $isApproved;
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
