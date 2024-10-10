<?php declare(strict_types=1);

namespace Relewise\Models;

class ObservableVariantAttributeSelector extends VariantPropertySelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.EntityPropertySelectors.ObservableVariantAttributeSelector, Relewise.Client";
    
    public ObservableVariantAttribute $attribute;
    public static function create(ObservableVariantAttribute $attribute) : ObservableVariantAttributeSelector
    {
        $result = new ObservableVariantAttributeSelector();
        $result->attribute = $attribute;
        return $result;
    }
    
    public static function hydrate(array $arr) : ObservableVariantAttributeSelector
    {
        $result = VariantPropertySelector::hydrateBase(new ObservableVariantAttributeSelector(), $arr);
        if (array_key_exists("attribute", $arr))
        {
            $result->attribute = ObservableVariantAttribute::from($arr["attribute"]);
        }
        return $result;
    }
    
    function setAttribute(ObservableVariantAttribute $attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }
}
