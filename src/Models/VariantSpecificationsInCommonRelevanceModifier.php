<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Variant depending on whether certain SpecificationKeysAndMultipliers match with a specific variant. */
class VariantSpecificationsInCommonRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationsInCommonRelevanceModifier, Relewise.Client";
    /** A collection of KeyMultiplier that each define a certain key and value that the relevance should be multiplied with if matching on this key. The default multiplier for keys not included, is 1.0. */
    public array $specificationKeysAndMultipliers;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Variant depending on whether certain SpecificationKeysAndMultipliers match with a specific variant.
     * @param KeyMultiplier[] $specificationKeysAndMultipliers A collection of  that each define a certain key and value that the relevance should be multiplied with if matching on this key. The default multiplier for keys not included, is 1.0.
     */
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
    /** A collection of KeyMultiplier that each define a certain key and value that the relevance should be multiplied with if matching on this key. The default multiplier for keys not included, is 1.0. */
    function setSpecificationKeysAndMultipliers(KeyMultiplier ... $specificationKeysAndMultipliers)
    {
        $this->specificationKeysAndMultipliers = $specificationKeysAndMultipliers;
        return $this;
    }
    /**
     * A collection of KeyMultiplier that each define a certain key and value that the relevance should be multiplied with if matching on this key. The default multiplier for keys not included, is 1.0.
     * @param KeyMultiplier[] $specificationKeysAndMultipliers new value.
     */
    function setSpecificationKeysAndMultipliersFromArray(array $specificationKeysAndMultipliers)
    {
        $this->specificationKeysAndMultipliers = $specificationKeysAndMultipliers;
        return $this;
    }
    /** A collection of KeyMultiplier that each define a certain key and value that the relevance should be multiplied with if matching on this key. The default multiplier for keys not included, is 1.0. */
    function addToSpecificationKeysAndMultipliers(KeyMultiplier $specificationKeysAndMultipliers)
    {
        if (!isset($this->specificationKeysAndMultipliers))
        {
            $this->specificationKeysAndMultipliers = array();
        }
        array_push($this->specificationKeysAndMultipliers, $specificationKeysAndMultipliers);
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
