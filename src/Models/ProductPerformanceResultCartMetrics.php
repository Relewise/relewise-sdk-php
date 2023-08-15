<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultCartMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+CartMetrics, Relewise.Client";
    public int $opened;
    public static function create() : ProductPerformanceResultCartMetrics
    {
        $result = new ProductPerformanceResultCartMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultCartMetrics
    {
        $result = new ProductPerformanceResultCartMetrics();
        if (array_key_exists("opened", $arr))
        {
            $result->opened = $arr["opened"];
        }
        return $result;
    }
    /**
     * Sets opened to a new value.
     * @param int $opened new value.
     */
    function setOpened(int $opened)
    {
        $this->opened = $opened;
        return $this;
    }
}
