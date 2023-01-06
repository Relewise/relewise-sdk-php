<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductPerformanceResult
{
    public ProductResult $product;
    public array $classifications;
    public static function create() : ProductPerformanceResult
    {
        $result = new ProductPerformanceResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResult
    {
        $result = new ProductPerformanceResult();
        if (array_key_exists("product", $arr))
        {
            $result->product = ProductResult::hydrate($arr["product"]);
        }
        if (array_key_exists("classifications", $arr))
        {
            $result->classifications = array();
            foreach($arr["classifications"] as &$value)
            {
                array_push($result->classifications, ProductPerformanceResultClassificationMetrics::hydrate($value));
            }
        }
        return $result;
    }
    function setProduct(ProductResult $product)
    {
        $this->product = $product;
        return $this;
    }
    function setClassifications(ProductPerformanceResultClassificationMetrics ... $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
}
