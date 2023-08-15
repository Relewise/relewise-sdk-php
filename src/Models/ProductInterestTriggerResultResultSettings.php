<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductInterestTriggerResultResultSettings
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductInterestTriggerResult+ResultSettings, Relewise.Client";
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
    /**
     * Sets selectedProductProperties to a new value.
     * @param SelectedProductPropertiesSettings $selectedProductProperties new value.
     */
    function setSelectedProductProperties(SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    /**
     * Sets selectedVariantProperties to a new value.
     * @param SelectedVariantPropertiesSettings $selectedVariantProperties new value.
     */
    function setSelectedVariantProperties(SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
}
