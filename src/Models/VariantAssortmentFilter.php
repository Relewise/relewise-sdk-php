<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantAssortmentFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantAssortmentFilter, Relewise.Client";
    public array $assortments;
    public static function create(bool $negated = false) : VariantAssortmentFilter
    {
        $result = new VariantAssortmentFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantAssortmentFilter
    {
        $result = Filter::hydrateBase(new VariantAssortmentFilter(), $arr);
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
    /**
     * Sets assortments to a new value.
     * @param int[] $assortments new value.
     */
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Adds a new element to assortments.
     * @param int $assortments new element.
     */
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
