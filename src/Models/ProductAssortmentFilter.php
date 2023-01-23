<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductAssortmentFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductAssortmentFilter, Relewise.Client";
    public array $assortments;
    public static function create(bool $negated = false) : ProductAssortmentFilter
    {
        $result = new ProductAssortmentFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentFilter
    {
        $result = Filter::hydrateBase(new ProductAssortmentFilter(), $arr);
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        return $result;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
