<?php declare(strict_types=1);
namespace Relewise\Factory;

use Relewise\Models\DataValue;
use Relewise\Models\Language;
use Relewise\Models\Money;
use Relewise\Models\DataValueDataValueTypes;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;

class DataValueFactory {
    /** This method takes a string. */
    public static function string(string $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::String)
            ->setValue($value);
    }

    /** This method takes a float. */
    public static function float(float $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Double)
            ->setValue($value);
    }
    
    /** This method takes a bool. */
    public static function boolean(bool $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Boolean)
            ->setValue($value);
    }

    /** This method takes a Money object. */
    public static function money(Money $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Money)
            ->setValue($value);
    }

    /** This method takes any number of Money objects. */
    public static function multiCurrencyFromMultipleMoney(Money ... $moneyValues) : DataValue {
        return DataValueFactory::multiCurrencyFromMoneyArray($moneyValues);
    }
    /** This method takes an array of Money objects. */
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

    /** This method takes any number of strings. */
    public static function stringList(string ... $values) : DataValue {
        return DataValueFactory::stringListFromArray($values);
    }
    /** This method takes an array of strings. */
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

    /** This method takes any number of floats. */
    public static function floatList(float ... $values) : DataValue {
        return DataValueFactory::floatListFromArray($values);
    }
    /** This method takes an array of floats. */
    public static function floatListFromArray(array $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::DoubleList)
            ->setValue(
                array(
                    "\$type" => "System.Collections.Generic.List`1[[System.Double, System.Private.CoreLib]], System.Private.CoreLib",
                    "\$values" => $values
                )
            );
    }

    /** This method takes any number of bools. */
    public static function booleanList(bool ... $values) : DataValue {
        return DataValueFactory::booleanListFromArray($values);
    }
    /** This method takes an array of bools. */
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

    /** This method takes a Multilingual. */
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

    /** This method takes a Language and any number of strings. */
    public static function multilingualCollectionWithSingleLanguage(Language $language, string ... $values) : DataValue {
        return DataValueFactory::multilingualCollectionWithSingleLanguageFromArray($language, $values);
    }
    /** This method takes a Language and an array of strings. */
    public static function multilingualCollectionWithSingleLanguageFromArray(Language $language, array $values) : DataValue {
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

    /** This method takes an array of arrays with two keys "Language" being a Language and "Values" being an array of strings.
     * Example:
     * array(array("Language" => "da", "Values" => array("Hallo")), array("Language" => "en", "Values" => array("Hello")))
    */
    public static function multilingualCollection(array $values) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::MultilingualCollection)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.MultilingualCollection, Relewise.Client",
                    "Values" => $values
                ));
    }

    /** This method takes an array of key value pairs. */
    public static function object(mixed $data) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Object)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.DataObject, Relewise.Client",
                    "Data" => $data
                ));
    }

    /** This method takes multiple arrays within, each with key value pairs. */ 
    public static function objectList(mixed ... $objects) : DataValue {
        return DataValueFactory::objectListFromArray($objects);
    }
    /** This method takes an arrray with multiple arrays within, each with key value pairs. */ 
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
