<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Variant depending on whether certain <see cref="P:Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationsInCommonRelevanceModifier.SpecificationKeysAndMultipliers"> match with a specific variant.            </see></see> */
class VariantSpecificationsInCommonRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationsInCommonRelevanceModifier, Relewise.Client";
    /** A collection of <see cref="T:Relewise.Client.DataTypes.KeyMultiplier"> that each define a certain key and value that the relevance should be multiplied with if matching on this key. The default multiplier for keys not included, is 1.0.            </see> */
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
    function setSpecificationKeysAndMultipliersFromArray(array $specificationKeysAndMultipliers)
    {
        $this->specificationKeysAndMultipliers = $specificationKeysAndMultipliers;
        return $this;
    }
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
