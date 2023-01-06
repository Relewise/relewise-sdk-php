<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantSpecificationsInCommonRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationsInCommonRelevanceModifier, Relewise.Client";
    public array $specificationKeysAndMultipliers;
    public static function create(KeyMultiplier ... $specificationKeysAndMultipliers) : VariantSpecificationsInCommonRelevanceModifier
    {
        $result = new VariantSpecificationsInCommonRelevanceModifier();
        $result->specificationKeysAndMultipliers = $specificationKeysAndMultipliers;
        return $result;
    }
    public static function hydrate(array $arr) : VariantSpecificationsInCommonRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantSpecificationsInCommonRelevanceModifier(), $arr);
        if (array_key_exists("specificationKeysAndMultipliers", $arr))
        {
            $result->specificationKeysAndMultipliers = array();
            foreach($arr["specificationKeysAndMultipliers"] as &$value)
            {
                array_push($result->specificationKeysAndMultipliers, KeyMultiplier::hydrate($value));
            }
        }
        return $result;
    }
    function setSpecificationKeysAndMultipliers(KeyMultiplier ... $specificationKeysAndMultipliers)
    {
        $this->specificationKeysAndMultipliers = $specificationKeysAndMultipliers;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
