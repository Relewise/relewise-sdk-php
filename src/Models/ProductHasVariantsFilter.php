<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductHasVariantsFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductHasVariantsFilter, Relewise.Client";
    public ?intRange $numberOfVariants;
    /** Should disabled variants be considered when evaluating if a product has any variants? */
    public bool $includeDisabled;
    
    public static function create(?intRange $numberOfVariants, bool $negated = false) : ProductHasVariantsFilter
    {
        $result = new ProductHasVariantsFilter();
        $result->numberOfVariants = $numberOfVariants;
        $result->includeDisabled = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductHasVariantsFilter
    {
        $result = Filter::hydrateBase(new ProductHasVariantsFilter(), $arr);
        if (array_key_exists("numberOfVariants", $arr))
        {
            $result->numberOfVariants = intRange::hydrate($arr["numberOfVariants"]);
        }
        if (array_key_exists("includeDisabled", $arr))
        {
            $result->includeDisabled = $arr["includeDisabled"];
        }
        return $result;
    }
    
    function setNumberOfVariants(?intRange $numberOfVariants)
    {
        $this->numberOfVariants = $numberOfVariants;
        return $this;
    }
    
    /** Should disabled variants be considered when evaluating if a product has any variants? */
    function setIncludeDisabled(bool $includeDisabled)
    {
        $this->includeDisabled = $includeDisabled;
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
