<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class AbandonedSearch
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedSearch, Relewise.Client";
    public string $loweredSearchTerm;
    public int $hits;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedContentSearch, Relewise.Client")
        {
            return AbandonedContentSearch::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedProductCategorySearch, Relewise.Client")
        {
            return AbandonedProductCategorySearch::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedProductSearch, Relewise.Client")
        {
            return AbandonedProductSearch::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("loweredSearchTerm", $arr))
        {
            $result->loweredSearchTerm = $arr["loweredSearchTerm"];
        }
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        return $result;
    }
    function setLoweredSearchTerm(string $loweredSearchTerm)
    {
        $this->loweredSearchTerm = $loweredSearchTerm;
        return $this;
    }
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
}
