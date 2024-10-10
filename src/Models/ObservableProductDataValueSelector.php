<?php declare(strict_types=1);

namespace Relewise\Models;

class ObservableProductDataValueSelector extends ProductPropertySelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.EntityPropertySelectors.ObservableProductDataValueSelector, Relewise.Client";
    public DataObjectValueSelector $dataObjectValueSelector;
    public static function create(DataObjectValueSelector $dataObjectValueSelector) : ObservableProductDataValueSelector
    {
        $result = new ObservableProductDataValueSelector();
        $result->dataObjectValueSelector = $dataObjectValueSelector;
        return $result;
    }
    public static function hydrate(array $arr) : ObservableProductDataValueSelector
    {
        $result = ProductPropertySelector::hydrateBase(new ObservableProductDataValueSelector(), $arr);
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
