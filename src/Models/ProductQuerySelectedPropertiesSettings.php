<?php declare(strict_types=1);

namespace Relewise\Models;

/** Settings for which properties should be mapped for the result of the ProductQuery. If settings are not set they default to include everything. */
class ProductQuerySelectedPropertiesSettings
{
    /** Settings for which properties should be mapped for the ProductResultDetails in the ProductDetailsCollectionResponse returned for the current ProductQuery. */
    public ?SelectedProductDetailsPropertiesSettings $selectedProductDetailsProperties;
    /** Settings for which properties should be mapped for the VariantResultDetails in the ProductDetailsCollectionResponse returned for the current ProductQuery. */
    public ?SelectedVariantDetailsPropertiesSettings $selectedVariantDetailsProperties;
    
    public static function create() : ProductQuerySelectedPropertiesSettings
    {
        $result = new ProductQuerySelectedPropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductQuerySelectedPropertiesSettings
    {
        $result = new ProductQuerySelectedPropertiesSettings();
        if (array_key_exists("selectedProductDetailsProperties", $arr))
        {
            $result->selectedProductDetailsProperties = SelectedProductDetailsPropertiesSettings::hydrate($arr["selectedProductDetailsProperties"]);
        }
        if (array_key_exists("selectedVariantDetailsProperties", $arr))
        {
            $result->selectedVariantDetailsProperties = SelectedVariantDetailsPropertiesSettings::hydrate($arr["selectedVariantDetailsProperties"]);
        }
        return $result;
    }
    
    /** Settings for which properties should be mapped for the ProductResultDetails in the ProductDetailsCollectionResponse returned for the current ProductQuery. */
    function setSelectedProductDetailsProperties(?SelectedProductDetailsPropertiesSettings $selectedProductDetailsProperties)
    {
        $this->selectedProductDetailsProperties = $selectedProductDetailsProperties;
        return $this;
    }
    
    /** Settings for which properties should be mapped for the VariantResultDetails in the ProductDetailsCollectionResponse returned for the current ProductQuery. */
    function setSelectedVariantDetailsProperties(?SelectedVariantDetailsPropertiesSettings $selectedVariantDetailsProperties)
    {
        $this->selectedVariantDetailsProperties = $selectedVariantDetailsProperties;
        return $this;
    }
}
