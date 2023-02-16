<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultViewsAndSalesMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+ViewsAndSalesMetrics, Relewise.Client";
    public float $byViews;
    public float $bySales;
    public static function create() : ProductPerformanceResultViewsAndSalesMetrics
    {
        $result = new ProductPerformanceResultViewsAndSalesMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultViewsAndSalesMetrics
    {
        $result = new ProductPerformanceResultViewsAndSalesMetrics();
        if (array_key_exists("byViews", $arr))
        {
            $result->byViews = $arr["byViews"];
        }
        if (array_key_exists("bySales", $arr))
        {
            $result->bySales = $arr["bySales"];
        }
        return $result;
    }
    function setByViews(float $byViews)
    {
        $this->byViews = $byViews;
        return $this;
    }
    function setBySales(float $bySales)
    {
        $this->bySales = $bySales;
        return $this;
    }
}
