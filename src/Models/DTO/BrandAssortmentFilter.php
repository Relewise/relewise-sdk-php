<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandAssortmentFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.BrandAssortmentFilter, Relewise.Client";
    public array $assortments;
    public static function create(bool $negated = false) : BrandAssortmentFilter
    {
        $result = new BrandAssortmentFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : BrandAssortmentFilter
    {
        $result = Filter::hydrateBase(new BrandAssortmentFilter(), $arr);
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        return $result;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
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
