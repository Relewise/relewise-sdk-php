<?php declare(strict_types=1);
namespace Relewise\Factory;

use Relewise\Models\DataValue;
use Relewise\Models\Language;
use Relewise\Models\Money;
use Relewise\Models\DataValueDataValueTypes;

class DataValueFactory {
    public static function stringDataValue(string $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::String)
            ->setValue($value);
    }

    public static function doubleDataValue(float $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Double)
            ->setValue($value);
    }
    
    public static function booleanDataValue(bool $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Boolean)
            ->setValue($value);
    }

    public static function multiCurrencyDataValueFromSingleCurrency(Money $money) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultiCurrency)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultiCurrency, Relewise.Client",
                    "Values" => array($money)
                )
            );
    }

    public static function multiCurrencyDataValueFromMultipleMoney(Money ... $moneyValues) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultiCurrency)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultiCurrency, Relewise.Client",
                    "Values" => $moneyValues
                )
            );
    }

    public static function stringListDataValue(string ... $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::StringList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.String, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    public static function doubleListDataValue(float ... $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::DoubleList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Double, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    public static function booleanListDataValue(bool ... $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::BooleanList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Boolean, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    public static function multilingualCollectionDataValueFromLanguageAndCollection(Language $language, string ... $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultilingualCollection)
            ->setValue(
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
            ->setType(DataValueDataValueTypes::MultilingualCollection)
            ->setValue(
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
            ->setType(DataValueDataValueTypes::Object)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.DataObject, Relewise.Client",
                    "Data" => $data
                ));
    }

    public static function objectListDataValue(array $objects) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::ObjectList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[Relewise.Client.DataTypes.DataObject, Relewise.Client]], System.Private.CoreLib",
                    "\$values" => $objects
                )
            );
    }
}
