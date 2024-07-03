<?php declare(strict_types=1);

namespace Relewise\Models;

class ObservableProductAttributeSelector extends ProductPropertySelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.EntityPropertySelectors.ObservableProductAttributeSelector, Relewise.Client";
    public ObservableProductAttribute $attribute;
    public static function create(ObservableProductAttribute $attribute) : ObservableProductAttributeSelector
    {
        $result = new ObservableProductAttributeSelector();
        $result->attribute = $attribute;
        return $result;
    }
    public static function hydrate(array $arr) : ObservableProductAttributeSelector
    {
        $result = ProductPropertySelector::hydrateBase(new ObservableProductAttributeSelector(), $arr);
        if (array_key_exists("attribute", $arr))
        {
            $result->attribute = ObservableProductAttribute::from($arr["attribute"]);
        }
        return $result;
    }
    function setAttribute(ObservableProductAttribute $attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }
}
