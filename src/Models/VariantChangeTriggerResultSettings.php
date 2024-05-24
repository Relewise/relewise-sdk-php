<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantChangeTriggerResultSettings
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.ResultSettings.VariantChangeTriggerResultSettings, Relewise.Client";
    public SelectedProductPropertiesSettings $selectedProductProperties;
    public SelectedVariantPropertiesSettings $selectedVariantProperties;
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
