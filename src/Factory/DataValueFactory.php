<?php declare(strict_types=1);
namespace Relewise\Factory;

use Relewise\Models\DTO\DataValue;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\Money;
use Relewise\Models\DTO\DataValueTypes;

class DataValueFactory {
    public static function stringDataValue(string $value) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::String)
            ->withValue($value);
    }

    public static function doubleDataValue(float $value) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::Double)
            ->withValue($value);
    }
    
    public static function booleanDataValue(bool $value) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::Boolean)
            ->withValue($value);
    }

    public static function multiCurrencyDataValueFromSingleCurrency(Money $money) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::MultiCurrency)
            ->withValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultiCurrency, Relewise.Client",
                    "Values" => array($money)
                )
            );
    }

    public static function multiCurrencyDataValueFromMultipleCurrencies(array $moneyValues) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::MultiCurrency)
            ->withValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultiCurrency, Relewise.Client",
                    "Values" => $moneyValues
                )
            );
    }

    public static function stringListDataValue(array $values) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::StringList)
            ->withValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.String, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    public static function doubleListDataValue(array $values) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::DoubleList)
            ->withValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Double, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    public static function booleanListDataValue(array $values) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::BooleanList)
            ->withValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Boolean, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    public static function multilingualCollectionDataValueFromLanguageAndCollection(Language $language, array $values) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::MultilingualCollection)
            ->withValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultilingualCollection, Relewise.Client",
                    "Values" => array(
                        array(
                            "Language" => $language,
                            "Values" => $values,
                        )
                    )
                ));
    }

    public static function multilingualCollectionDataValueFromMultilingualCollectionValues(array $values) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::MultilingualCollection)
            ->withValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultilingualCollection, Relewise.Client",
                    "Values" => $values
                ));
    }

    public static function object(mixed $data) {
        return array(
            "Data" => $data
        );
    }

    public static function objectDataValue(mixed $data) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::Object)
            ->withValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.DataObject, Relewise.Client",
                    "Data" => $data
                ));
    }

    public static function objectListDataValue(array $objects) : DataValue {
        return DataValue::create()
            ->withType(DataValueTypes::ObjectList)
            ->withValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[Relewise.Client.DataTypes.DataObject, Relewise.Client]], System.Private.CoreLib",
                    "\$values" => $objects
                )
            );
    }
}
