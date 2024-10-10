<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantChangeTriggerResultSettings
{
    public SelectedProductDetailsPropertiesSettings $selectedProductProperties;
    public SelectedVariantDetailsPropertiesSettings $selectedVariantProperties;
    public static function create() : VariantChangeTriggerResultSettings
    {
        $result = new VariantChangeTriggerResultSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantChangeTriggerResultSettings
    {
        $result = new VariantChangeTriggerResultSettings();
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
