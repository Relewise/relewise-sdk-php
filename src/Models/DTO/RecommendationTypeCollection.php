<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RecommendationTypeCollection
{
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
    function setUnionCodes(int ... $unionCodes)
    {
        $this->unionCodes = $unionCodes;
        return $this;
    }
}
