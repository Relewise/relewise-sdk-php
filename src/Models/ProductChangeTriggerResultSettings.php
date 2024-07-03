<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductChangeTriggerResultSettings
{
    public SelectedProductPropertiesSettings $selectedProductProperties;
    public SelectedVariantPropertiesSettings $selectedVariantProperties;
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
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        return $result;
    }
    function setSelectedProductProperties(SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    function setSelectedVariantProperties(SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
}
