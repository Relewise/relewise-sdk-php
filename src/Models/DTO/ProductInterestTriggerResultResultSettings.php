<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductInterestTriggerResultResultSettings
{
    public SelectedProductPropertiesSettings $selectedProductProperties;
    public SelectedVariantPropertiesSettings $selectedVariantProperties;
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
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        return $result;
    }
    function withSelectedProductProperties(SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    function withSelectedVariantProperties(SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
}
