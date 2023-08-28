<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SimilarProductsEvaluationSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SimilarProductsEvaluationSettings, Relewise.Client";
    public float $significanceOfSimilaritiesInDisplayName;
    public ?TrimStringTransformer $productDisplayNameTransformer;
    public float $significanceOfSimilarListPrice;
    public float $significanceOfCommonImmediateParentCategories;
    public float $significanceOfCommonParentsParentCategories;
    public float $significanceOfCommonAncestorCategories;
    public float $significanceOfCommonProductDataKeys;
    public float $significanceOfIdenticalProductDataValues;
    public ?array $significantProductDataFields;
    public float $significanceOfSimilarSalesPrice;
    public float $significanceOfSimilarBrand;
    public static function create() : SimilarProductsEvaluationSettings
    {
        $result = new SimilarProductsEvaluationSettings();
        return $result;
    }
    public static function hydrate(array $arr) : SimilarProductsEvaluationSettings
    {
        $result = new SimilarProductsEvaluationSettings();
        if (array_key_exists("significanceOfSimilaritiesInDisplayName", $arr))
        {
            $result->significanceOfSimilaritiesInDisplayName = $arr["significanceOfSimilaritiesInDisplayName"];
        }
        if (array_key_exists("productDisplayNameTransformer", $arr))
        {
            $result->productDisplayNameTransformer = TrimStringTransformer::hydrate($arr["productDisplayNameTransformer"]);
        }
        if (array_key_exists("significanceOfSimilarListPrice", $arr))
        {
            $result->significanceOfSimilarListPrice = $arr["significanceOfSimilarListPrice"];
        }
        if (array_key_exists("significanceOfCommonImmediateParentCategories", $arr))
        {
            $result->significanceOfCommonImmediateParentCategories = $arr["significanceOfCommonImmediateParentCategories"];
        }
        if (array_key_exists("significanceOfCommonParentsParentCategories", $arr))
        {
            $result->significanceOfCommonParentsParentCategories = $arr["significanceOfCommonParentsParentCategories"];
        }
        if (array_key_exists("significanceOfCommonAncestorCategories", $arr))
        {
            $result->significanceOfCommonAncestorCategories = $arr["significanceOfCommonAncestorCategories"];
        }
        if (array_key_exists("significanceOfCommonProductDataKeys", $arr))
        {
            $result->significanceOfCommonProductDataKeys = $arr["significanceOfCommonProductDataKeys"];
        }
        if (array_key_exists("significanceOfIdenticalProductDataValues", $arr))
        {
            $result->significanceOfIdenticalProductDataValues = $arr["significanceOfIdenticalProductDataValues"];
        }
        if (array_key_exists("significantProductDataFields", $arr))
        {
            $result->significantProductDataFields = array();
            foreach($arr["significantProductDataFields"] as &$value)
            {
                array_push($result->significantProductDataFields, SignificantDataValue::hydrate($value));
            }
        }
        if (array_key_exists("significanceOfSimilarSalesPrice", $arr))
        {
            $result->significanceOfSimilarSalesPrice = $arr["significanceOfSimilarSalesPrice"];
        }
        if (array_key_exists("significanceOfSimilarBrand", $arr))
        {
            $result->significanceOfSimilarBrand = $arr["significanceOfSimilarBrand"];
        }
        return $result;
    }
    function setSignificanceOfSimilaritiesInDisplayName(float $significanceOfSimilaritiesInDisplayName)
    {
        $this->significanceOfSimilaritiesInDisplayName = $significanceOfSimilaritiesInDisplayName;
        return $this;
    }
    function setProductDisplayNameTransformer(?TrimStringTransformer $productDisplayNameTransformer)
    {
        $this->productDisplayNameTransformer = $productDisplayNameTransformer;
        return $this;
    }
    function setSignificanceOfSimilarListPrice(float $significanceOfSimilarListPrice)
    {
        $this->significanceOfSimilarListPrice = $significanceOfSimilarListPrice;
        return $this;
    }
    function setSignificanceOfCommonImmediateParentCategories(float $significanceOfCommonImmediateParentCategories)
    {
        $this->significanceOfCommonImmediateParentCategories = $significanceOfCommonImmediateParentCategories;
        return $this;
    }
    function setSignificanceOfCommonParentsParentCategories(float $significanceOfCommonParentsParentCategories)
    {
        $this->significanceOfCommonParentsParentCategories = $significanceOfCommonParentsParentCategories;
        return $this;
    }
    function setSignificanceOfCommonAncestorCategories(float $significanceOfCommonAncestorCategories)
    {
        $this->significanceOfCommonAncestorCategories = $significanceOfCommonAncestorCategories;
        return $this;
    }
    function setSignificanceOfCommonProductDataKeys(float $significanceOfCommonProductDataKeys)
    {
        $this->significanceOfCommonProductDataKeys = $significanceOfCommonProductDataKeys;
        return $this;
    }
    function setSignificanceOfIdenticalProductDataValues(float $significanceOfIdenticalProductDataValues)
    {
        $this->significanceOfIdenticalProductDataValues = $significanceOfIdenticalProductDataValues;
        return $this;
    }
    function setSignificantProductDataFields(SignificantDataValue ... $significantProductDataFields)
    {
        $this->significantProductDataFields = $significantProductDataFields;
        return $this;
    }
    /** @param ?SignificantDataValue[] $significantProductDataFields new value. */
    function setSignificantProductDataFieldsFromArray(array $significantProductDataFields)
    {
        $this->significantProductDataFields = $significantProductDataFields;
        return $this;
    }
    function addToSignificantProductDataFields(SignificantDataValue $significantProductDataFields)
    {
        if (!isset($this->significantProductDataFields))
        {
            $this->significantProductDataFields = array();
        }
        array_push($this->significantProductDataFields, $significantProductDataFields);
        return $this;
    }
    function setSignificanceOfSimilarSalesPrice(float $significanceOfSimilarSalesPrice)
    {
        $this->significanceOfSimilarSalesPrice = $significanceOfSimilarSalesPrice;
        return $this;
    }
    function setSignificanceOfSimilarBrand(float $significanceOfSimilarBrand)
    {
        $this->significanceOfSimilarBrand = $significanceOfSimilarBrand;
        return $this;
    }
}
