<?php declare(strict_types=1);
namespace Relewise\Factory;

use Relewise\Models\DataValue;
use Relewise\Models\Language;
use Relewise\Models\Money;
use Relewise\Models\DataValueDataValueTypes;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;

class DataValueFactory {
    /** You should parse a string to this method. */
    public static function string(string $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::String)
            ->setValue($value);
    }

    /** You should parse a double to this method. */
    public static function double(float $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Double)
            ->setValue($value);
    }
    
    /** You should parse a bool to this method. */
    public static function boolean(bool $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Boolean)
            ->setValue($value);
    }

    /** You should parse a Money object to this method. */
    public static function multiCurrencyFromSingleCurrency(Money $money) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultiCurrency)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultiCurrency, Relewise.Client",
                    "Values" => array($money)
                )
            );
    }

    /** You should parse any number of Money objects to this method. */
    public static function multiCurrencyFromMultipleMoney(Money ... $moneyValues) : DataValue {
        return DataValueFactory::multiCurrencyFromMoneyArray($moneyValues);
    }
    /** You should parse an array of Money objects to this method. */
    public static function multiCurrencyFromMoneyArray(array $moneyValues) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultiCurrency)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultiCurrency, Relewise.Client",
                    "Values" => $moneyValues
                )
            );
    }

    /** You should parse any number of strings to this method. */
    public static function stringList(string ... $values) : DataValue {
        return DataValueFactory::stringListFromArray($values);
    }
    /** You should parse an array of strings to this method. */
    public static function stringListFromArray(array $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::StringList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.String, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    /** You should parse any number of floats to this method. */
    public static function doubleList(float ... $values) : DataValue {
        return DataValueFactory::doubleListFromArray($values);
    }
    /** You should parse an array of floats to this method. */
    public static function doubleListFromArray(array $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::DoubleList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Double, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    /** You should parse any number of bools to this method. */
    public static function booleanList(bool ... $values) : DataValue {
        return DataValueFactory::booleanListFromArray($values);
    }
    /** You should parse an array of bools to this method. */
    public static function booleanListFromArray(array $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::BooleanList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Boolean, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    /** You should parse a Multilingual to this method. */
    public static function multilingual(Multilingual $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Multilingual)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.Multilingual, Relewise.Client",
                    "Values" => $value->values
                )
            );
    }

    /** You should parse a Language and any number of strings to this method. */
    public static function multilingualCollectionFromLanguageAndCollection(Language $language, string ... $values) : DataValue {
        return DataValueFactory::multilingualCollectionFromLanguageAndCollectionFromArray($language, $values);
    }
    /** You should parse a Language and an array of strings to this method. */
    public static function multilingualCollectionFromLanguageAndCollectionFromArray(Language $language, array $values) : DataValue {
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

    /** You should parse an array with two keys "Language" being a Language and "Values" being an array of strings to this method. */
    public static function multilingualCollectionFromMultilingualCollectionValues(array $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultilingualCollection)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultilingualCollection, Relewise.Client",
                    "Values" => $values
                ));
    }

    /** You should parse an array of key value pairs to this method. */
    public static function object(mixed $data) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Object)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.DataObject, Relewise.Client",
                    "Data" => $data
                ));
    }

    /** You should parse multiple arrays in each with key value pairs to this method. */ 
    public static function objectList(mixed ... $objects) : DataValue {
        return DataValueFactory::objectListFromArray($objects);
    }
    /** You should parse an arrray with multiple arrays in each with key value pairs to this method. */ 
    public static function objectListFromArray(array $objects) : DataValue {
        $values = array();
        foreach ($objects as $object) {
            array_push($values, DataValueFactory::objectWrapper($object));
        }
        return DataValue::create()
            ->setType(DataValueDataValueTypes::ObjectList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[Relewise.Client.DataTypes.DataObject, Relewise.Client]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }
    private static function objectWrapper(mixed $data) {
        return array(
            "Data" => $data
        );
    }
}
