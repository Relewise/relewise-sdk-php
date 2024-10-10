<?php declare(strict_types=1);

namespace Relewise\Models;

class ObservableVariantDataValueSelector extends VariantPropertySelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.EntityPropertySelectors.ObservableVariantDataValueSelector, Relewise.Client";
    public DataObjectValueSelector $dataObjectValueSelector;
    
    public static function create(DataObjectValueSelector $dataObjectValueSelector) : ObservableVariantDataValueSelector
    {
        $result = new ObservableVariantDataValueSelector();
        $result->dataObjectValueSelector = $dataObjectValueSelector;
        return $result;
    }
    
    public static function hydrate(array $arr) : ObservableVariantDataValueSelector
    {
        $result = VariantPropertySelector::hydrateBase(new ObservableVariantDataValueSelector(), $arr);
        if (array_key_exists("dataObjectValueSelector", $arr))
        {
            $result->dataObjectValueSelector = DataObjectValueSelector::hydrate($arr["dataObjectValueSelector"]);
        }
        return $result;
    }
    
    function setDataObjectValueSelector(DataObjectValueSelector $dataObjectValueSelector)
    {
        $this->dataObjectValueSelector = $dataObjectValueSelector;
        return $this;
    }
}
