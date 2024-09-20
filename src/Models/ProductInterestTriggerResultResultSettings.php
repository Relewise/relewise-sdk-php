<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductInterestTriggerResultResultSettings
{
    public SelectedProductDetailsPropertiesSettings $selectedProductProperties;
    public SelectedVariantDetailsPropertiesSettings $selectedVariantProperties;
    public static function create() : ProductInterestTriggerResultResultSettings
    {
        $result = new ProductInterestTriggerResultResultSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ProductInterestTriggerResultResultSettings
    {
        $result = new ProductInterestTriggerResultResultSettings();
        if (array_key_exists("selectedProductProperties", $arr))
        {
            $result->selectedProductProperties = SelectedProductDetailsPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantDetailsPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        return $result;
    }
    function setSelectedProductProperties(SelectedProductDetailsPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    function setSelectedVariantProperties(SelectedVariantDetailsPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
}
