<?php declare(strict_types=1);
namespace Relewise\Factory;

use Relewise\Models\DataValue;
use Relewise\Models\Language;
use Relewise\Models\Money;
use Relewise\Models\DataValueDataValueTypes;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;

class DataValueFactory {
    /**
     * Creates a string DataValue.
     *
     * @param string $value String value.
     * @return DataValue
     */
    public static function string(string $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::String)
            ->setValue($value);
    }

    /**
     * Creates a floating-point DataValue.
     *
     * @param float $value Floating-point value.
     * @return DataValue
     */
    public static function float(float $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Double)
            ->setValue($value);
    }
    
    /**
     * Creates a boolean DataValue.
     *
     * @param bool $value Boolean value.
     * @return DataValue
     */
    public static function boolean(bool $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Boolean)
            ->setValue($value);
    }

    /**
     * Creates a money DataValue.
     *
     * @param Money $value Money value.
     * @return DataValue
     */
    public static function money(Money $value) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Money)
            ->setValue($value);
    }

    /**
     * Creates a multi-currency DataValue from multiple Money values.
     *
     * @param Money ...$moneyValues Money values.
     * @return DataValue
     */
    public static function multiCurrencyFromMultipleMoney(Money ... $moneyValues) : DataValue {
        return DataValueFactory::multiCurrencyFromMoneyArray($moneyValues);
    }

    /**
     * Creates a multi-currency DataValue from an array of Money values.
     *
     * @param Money[] $moneyValues Money values.
     * @return DataValue
     */
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

    /**
     * Creates a string-list DataValue from multiple strings.
     *
     * @param string ...$values String values.
     * @return DataValue
     */
    public static function stringList(string ... $values) : DataValue {
        return DataValueFactory::stringListFromArray($values);
    }

    /**
     * Creates a string-list DataValue from an array of strings.
     *
     * @param string[] $values String values.
     * @return DataValue
     */
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

    /**
     * Creates a float-list DataValue from multiple floating-point values.
     *
     * @param float ...$values Floating-point values.
     * @return DataValue
     */
    public static function floatList(float ... $values) : DataValue {
        return DataValueFactory::floatListFromArray($values);
    }

    /**
     * Creates a float-list DataValue from an array of floating-point values.
     *
     * @param float[] $values Floating-point values.
     * @return DataValue
     */
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

    /**
     * Creates a boolean-list DataValue from multiple boolean values.
     *
     * @param bool ...$values Boolean values.
     * @return DataValue
     */
    public static function booleanList(bool ... $values) : DataValue {
        return DataValueFactory::booleanListFromArray($values);
    }

    /**
     * Creates a boolean-list DataValue from an array of booleans.
     *
     * @param bool[] $values Boolean values.
     * @return DataValue
     */
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

    /**
     * Creates a multilingual DataValue.
     *
     * @param Multilingual $value Multilingual value.
     * @return DataValue
     */
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

    /**
     * Creates a multilingual collection DataValue for a single language from multiple strings.
     *
     * @param Language $language Language for all values.
     * @param string ...$values String values for the language.
     * @return DataValue
     */
    public static function multilingualCollectionWithSingleLanguage(Language $language, string ... $values) : DataValue {
        return DataValueFactory::multilingualCollectionWithSingleLanguageFromArray($language, $values);
    }

    /**
     * Creates a multilingual collection DataValue for a single language from an array of strings.
     *
     * @param Language $language Language for all values.
     * @param string[] $values String values for the language.
     * @return DataValue
     */
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

    /**
     * Creates a multilingual collection DataValue.
     *
     * @param array<int, array{Language: Language, Values: string[]}> $values Language/value entries.
     * @return DataValue
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

    /**
     * Creates an object DataValue from arbitrary data.
     *
     * @param mixed $data Data payload, typically an associative array.
     * @return DataValue
     */
    public static function object(mixed $data) : DataValue {
        return DataValue::create()
            ->setType(DataValueDataValueTypes::Object)
            ->setValue(
                array(
                    "\$type" => "Relewise.Client.DataTypes.DataObject, Relewise.Client",
                    "Data" => $data
                ));
    }

    /**
     * Creates an object-list DataValue from multiple object payloads.
     *
     * @param mixed ...$objects Object payloads.
     * @return DataValue
     */
    public static function objectList(mixed ... $objects) : DataValue {
        return DataValueFactory::objectListFromArray($objects);
    }

    /**
     * Creates an object-list DataValue from an array of object payloads.
     *
     * @param mixed[] $objects Object payloads.
     * @return DataValue
     */
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
