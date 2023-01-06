<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.BrandIdFilter, Relewise.Client";
    public array $brandIds;
    public static function create(bool $negated = false) : BrandIdFilter
    {
        $result = new BrandIdFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : BrandIdFilter
    {
        $result = Filter::hydrateBase(new BrandIdFilter(), $arr);
        if (array_key_exists("brandIds", $arr))
        {
            $result->brandIds = array();
            foreach($arr["brandIds"] as &$value)
            {
                array_push($result->brandIds, $value);
            }
        }
        return $result;
    }
    function withBrandIds(string ... $brandIds)
    {
        $this->brandIds = $brandIds;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
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