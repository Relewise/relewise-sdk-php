<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductHasVariantsFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductHasVariantsFilter, Relewise.Client";
    public ?intRange $numberOfVariants;
    public static function create(?intRange $numberOfVariants, bool $negated = false) : ProductHasVariantsFilter
    {
        $result = new ProductHasVariantsFilter();
        $result->numberOfVariants = $numberOfVariants;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductHasVariantsFilter
    {
        $result = Filter::hydrateBase(new ProductHasVariantsFilter(), $arr);
        if (array_key_exists("numberOfVariants", $arr))
        {
            $result->numberOfVariants = intRange::hydrate($arr["numberOfVariants"]);
        }
        return $result;
    }
    function withNumberOfVariants(?intRange $numberOfVariants)
    {
        $this->numberOfVariants = $numberOfVariants;
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