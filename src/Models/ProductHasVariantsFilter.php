<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setNumberOfVariants(?intRange $numberOfVariants)
    {
        $this->numberOfVariants = $numberOfVariants;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
