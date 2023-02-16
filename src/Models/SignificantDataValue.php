<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SignificantDataValue
{
    public string $typeDefinition = "Relewise.Client.DataTypes.SignificantDataValue, Relewise.Client";
    public string $key;
    public SignificantDataValueSignificantDataValueComparer $comparer;
    public float $significance;
    public ?TrimStringTransformer $transformer;
    public static function create(string $key, SignificantDataValueSignificantDataValueComparer $comparer, float $significance = 1, ?TrimStringTransformer $transformer = Null) : SignificantDataValue
    {
        $result = new SignificantDataValue();
        $result->key = $key;
        $result->comparer = $comparer;
        $result->significance = $significance;
        $result->transformer = $transformer;
        return $result;
    }
    public static function hydrate(array $arr) : SignificantDataValue
    {
        $result = new SignificantDataValue();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("comparer", $arr))
        {
            $result->comparer = SignificantDataValueSignificantDataValueComparer::from($arr["comparer"]);
        }
        if (array_key_exists("significance", $arr))
        {
            $result->significance = $arr["significance"];
        }
        if (array_key_exists("transformer", $arr))
        {
            $result->transformer = TrimStringTransformer::hydrate($arr["transformer"]);
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setComparer(SignificantDataValueSignificantDataValueComparer $comparer)
    {
        $this->comparer = $comparer;
        return $this;
    }
    function setSignificance(float $significance)
    {
        $this->significance = $significance;
        return $this;
    }
    function setTransformer(?TrimStringTransformer $transformer)
    {
        $this->transformer = $transformer;
        return $this;
    }
}
