<?php declare(strict_types=1);

namespace Relewise\Models;

class SynonymsRequestSynonymSortingSorting
{
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
    function setSortBy(SynonymsRequestSynonymSorting $sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }
    function setSortOrder(SortOrder $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }
}
