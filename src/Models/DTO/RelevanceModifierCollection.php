<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RelevanceModifierCollection
{
    public ?array $items;
    public static function create(RelevanceModifier ... $relevanceModifiers) : RelevanceModifierCollection
    {
        $result = new RelevanceModifierCollection();
        $result->items = $relevanceModifiers;
        return $result;
    }
    public static function hydrate(array $arr) : RelevanceModifierCollection
    {
        $result = new RelevanceModifierCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, RelevanceModifier::hydrate($value));
            }
        }
        return $result;
    }
    function withItems(RelevanceModifier ... $items)
    {
        $this->items = $items;
        return $this;
    }
}
