<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantIdFilter, Relewise.Client";
    public array $variantIds;
    public static function create(bool $negated = false) : VariantIdFilter
    {
        $result = new VariantIdFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantIdFilter
    {
        $result = Filter::hydrateBase(new VariantIdFilter(), $arr);
        if (array_key_exists("variantIds", $arr))
        {
            $result->variantIds = array();
            foreach($arr["variantIds"] as &$value)
            {
                array_push($result->variantIds, $value);
            }
        }
        return $result;
    }
    function withVariantIds(string ... $variantIds)
    {
        $this->variantIds = $variantIds;
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
