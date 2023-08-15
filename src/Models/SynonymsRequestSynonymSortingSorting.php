<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SynonymsRequestSynonymSortingSorting
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Sorting`1[[Relewise.Client.Requests.Search.SynonymsRequest+SynonymSorting, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public SynonymsRequestSynonymSorting $sortBy;
    public SortOrder $sortOrder;
    public static function create(SynonymsRequestSynonymSorting $sortBy, SortOrder $sortOrder) : SynonymsRequestSynonymSortingSorting
    {
        $result = new SynonymsRequestSynonymSortingSorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    public static function hydrate(array $arr) : SynonymsRequestSynonymSortingSorting
    {
        $result = new SynonymsRequestSynonymSortingSorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = SynonymsRequestSynonymSorting::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    /**
     * Sets sortBy to a new value.
     * @param SynonymsRequestSynonymSorting $sortBy new value.
     */
    function setSortBy(SynonymsRequestSynonymSorting $sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }
    /**
     * Sets sortOrder to a new value.
     * @param SortOrder $sortOrder new value.
     */
    function setSortOrder(SortOrder $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }
}
