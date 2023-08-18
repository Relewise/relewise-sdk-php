<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultViewsMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+ViewsMetrics, Relewise.Client";
    public int $total;
    public static function create() : ProductPerformanceResultViewsMetrics
    {
        $result = new ProductPerformanceResultViewsMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultViewsMetrics
    {
        $result = new ProductPerformanceResultViewsMetrics();
        if (array_key_exists("total", $arr))
        {
            $result->total = $arr["total"];
        }
        return $result;
    }
    function setTotal(int $total)
    {
        $this->total = $total;
        return $this;
    }
}
