<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantAssortmentFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantAssortmentFilter, Relewise.Client";
    public array $assortments;
    public static function create(bool $negated = false) : VariantAssortmentFilter
    {
        $result = new VariantAssortmentFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantAssortmentFilter
    {
        $result = Filter::hydrateBase(new VariantAssortmentFilter(), $arr);
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