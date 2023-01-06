<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class FixedDoubleValueSelector extends ValueSelector
{
    public string $typeDefinition = "Relewise.Client.Requests.ValueSelectors.FixedDoubleValueSelector, Relewise.Client";
    public float $value;
    public static function create(float $value) : FixedDoubleValueSelector
    {
        $result = new FixedDoubleValueSelector();
        $result->value = $value;
        return $result;
    }
    public static function hydrate(array $arr) : FixedDoubleValueSelector
    {
        $result = ValueSelector::hydrateBase(new FixedDoubleValueSelector(), $arr);
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    function setValue(float $value)
    {
        $this->value = $value;
        return $this;
    }
}
