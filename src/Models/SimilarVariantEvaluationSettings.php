<?php declare(strict_types=1);

namespace Relewise\Models;

class SimilarVariantEvaluationSettings
{
    public ?float $significanceOfSimilaritiesInDisplayName;
    
    public ?float $significanceOfSimilarListPrice;
    
    public ?float $significanceOfSimilarSalesPrice;
    
    public ?float $significanceOfCommonDataKeys;
    
    public ?float $significanceOfIdenticalDataValues;
    
    public ?array $significantDataFields;
    
    public static function create() : SimilarVariantEvaluationSettings
    {
        $result = new SimilarVariantEvaluationSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : SimilarVariantEvaluationSettings
    {
        $result = new SimilarVariantEvaluationSettings();
        if (array_key_exists("significanceOfSimilaritiesInDisplayName", $arr))
        {
            $result->significanceOfSimilaritiesInDisplayName = $arr["significanceOfSimilaritiesInDisplayName"];
        }
        if (array_key_exists("significanceOfSimilarListPrice", $arr))
        {
            $result->significanceOfSimilarListPrice = $arr["significanceOfSimilarListPrice"];
        }
        if (array_key_exists("significanceOfSimilarSalesPrice", $arr))
        {
            $result->significanceOfSimilarSalesPrice = $arr["significanceOfSimilarSalesPrice"];
        }
        if (array_key_exists("significanceOfCommonDataKeys", $arr))
        {
            $result->significanceOfCommonDataKeys = $arr["significanceOfCommonDataKeys"];
        }
        if (array_key_exists("significanceOfIdenticalDataValues", $arr))
        {
            $result->significanceOfIdenticalDataValues = $arr["significanceOfIdenticalDataValues"];
        }
        if (array_key_exists("significantDataFields", $arr))
        {
            $result->significantDataFields = array();
            foreach($arr["significantDataFields"] as &$value)
            {
                array_push($result->significantDataFields, SignificantDataValue::hydrate($value));
            }
        }
        return $result;
    }
    
    function setSignificanceOfSimilaritiesInDisplayName(?float $significanceOfSimilaritiesInDisplayName)
    {
        $this->significanceOfSimilaritiesInDisplayName = $significanceOfSimilaritiesInDisplayName;
        return $this;
    }
    
    function setSignificanceOfSimilarListPrice(?float $significanceOfSimilarListPrice)
    {
        $this->significanceOfSimilarListPrice = $significanceOfSimilarListPrice;
        return $this;
    }
    
    function setSignificanceOfSimilarSalesPrice(?float $significanceOfSimilarSalesPrice)
    {
        $this->significanceOfSimilarSalesPrice = $significanceOfSimilarSalesPrice;
        return $this;
    }
    
    function setSignificanceOfCommonDataKeys(?float $significanceOfCommonDataKeys)
    {
        $this->significanceOfCommonDataKeys = $significanceOfCommonDataKeys;
        return $this;
    }
    
    function setSignificanceOfIdenticalDataValues(?float $significanceOfIdenticalDataValues)
    {
        $this->significanceOfIdenticalDataValues = $significanceOfIdenticalDataValues;
        return $this;
    }
    
    function setSignificantDataFields(SignificantDataValue ... $significantDataFields)
    {
        $this->significantDataFields = $significantDataFields;
        return $this;
    }
    
    /** @param ?SignificantDataValue[] $significantDataFields new value. */
    function setSignificantDataFieldsFromArray(array $significantDataFields)
    {
        $this->significantDataFields = $significantDataFields;
        return $this;
    }
    
    function addToSignificantDataFields(SignificantDataValue $significantDataFields)
    {
        if (!isset($this->significantDataFields))
        {
            $this->significantDataFields = array();
        }
        array_push($this->significantDataFields, $significantDataFields);
        return $this;
    }
}
