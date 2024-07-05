<?php declare(strict_types=1);

namespace Relewise\Models;

class AdvertisersRequest extends EntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.AdvertisersRequest, Relewise.Client";
    public static function create(?AdvertisersRequestEntityFilters $filters, ?AdvertisersRequestSortBySorting $sorting, int $skip, int $take) : AdvertisersRequest
    {
        $result = new AdvertisersRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    public static function hydrate(array $arr) : AdvertisersRequest
    {
        $result = EntitiesRequest::hydrateBase(new AdvertisersRequest(), $arr);
        return $result;
    }
    function setFilters(?AdvertisersRequestEntityFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function setSorting(?AdvertisersRequestSortBySorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    function setSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    function setTake(int $take)
    {
        $this->take = $take;
        return $this;
    }
}
