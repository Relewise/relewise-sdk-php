<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentPopularitySorting extends ContentSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Content.ContentPopularitySorting, Relewise.Client";
    public static function create(SortOrder $order = SortOrder::Descending) : ContentPopularitySorting
    {
        $result = new ContentPopularitySorting();
        $result->order = $order;
        return $result;
    }
    public static function hydrate(array $arr) : ContentPopularitySorting
    {
        $result = ContentSorting::hydrateBase(new ContentPopularitySorting(), $arr);
        return $result;
    }
    function withOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    function withThenBy(ContentSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
