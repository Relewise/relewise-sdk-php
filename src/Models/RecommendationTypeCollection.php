<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RecommendationTypeCollection
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.RecommendationTypeCollection, Relewise.Client";
    public array $unionCodes;
    public static function create() : RecommendationTypeCollection
    {
        $result = new RecommendationTypeCollection();
        return $result;
    }
    public static function hydrate(array $arr) : RecommendationTypeCollection
    {
        $result = new RecommendationTypeCollection();
        if (array_key_exists("unionCodes", $arr))
        {
            $result->unionCodes = array();
            foreach($arr["unionCodes"] as &$value)
            {
                array_push($result->unionCodes, $value);
            }
        }
        return $result;
    }
    /**
     * Sets unionCodes to a new value.
     * @param int[] $unionCodes new value.
     */
    function setUnionCodes(int ... $unionCodes)
    {
        $this->unionCodes = $unionCodes;
        return $this;
    }
    /**
     * Sets unionCodes to a new value from an array.
     * @param int[] $unionCodes new value.
     */
    function setUnionCodesFromArray(array $unionCodes)
    {
        $this->unionCodes = $unionCodes;
        return $this;
    }
    /**
     * Adds a new element to unionCodes.
     * @param int $unionCodes new element.
     */
    function addToUnionCodes(int $unionCodes)
    {
        if (!isset($this->unionCodes))
        {
            $this->unionCodes = array();
        }
        array_push($this->unionCodes, $unionCodes);
        return $this;
    }
}
