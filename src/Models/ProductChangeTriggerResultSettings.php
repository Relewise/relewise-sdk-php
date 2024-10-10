<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductChangeTriggerResultSettings
{
    public SelectedProductDetailsPropertiesSettings $selectedProductProperties;
    public SelectedVariantDetailsPropertiesSettings $selectedVariantProperties;
    public static function create() : ProductChangeTriggerResultSettings
    {
        $result = new ProductChangeTriggerResultSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ProductChangeTriggerResultSettings
    {
        $result = new ProductChangeTriggerResultSettings();
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
