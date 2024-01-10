<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ObservableProductAttributeSelector
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
        $result = new ObservableProductAttributeSelector();
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
