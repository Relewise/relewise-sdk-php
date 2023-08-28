<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandAssortmentFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.BrandAssortmentFilter, Relewise.Client";
    public array $assortments;
    public static function create(bool $negated = false) : BrandAssortmentFilter
    {
        $result = new BrandAssortmentFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : BrandAssortmentFilter
    {
        $result = Filter::hydrateBase(new BrandAssortmentFilter(), $arr);
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
    /** @param int[] $assortments new value. */
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
