<?php declare(strict_types=1);

namespace Relewise\Models;

/** Search-specific variant controls for product search requests. */
class VariantSearchRequestSettings extends VariantRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.VariantSearchRequestSettings, Relewise.Client";
    public static function create() : VariantSearchRequestSettings
    {
        $result = new VariantSearchRequestSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantSearchRequestSettings
    {
        $result = VariantRequestSettings::hydrateBase(new VariantSearchRequestSettings(), $arr);
        return $result;
    }
    
    function setMaxVariantsPerProduct(?int $maxVariantsPerProduct)
    {
        $this->maxVariantsPerProduct = $maxVariantsPerProduct;
        return $this;
    }
    
    function setSorting(?VariantSorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
}
