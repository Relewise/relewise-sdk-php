<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on matching conditions on a certain key. */
class ProductDataRelevanceModifier extends DataRelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier, Relewise.Client";
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on matching conditions on a certain key.
     * @param string $key The data key that this RelevanceModifier will distinguish on.
     * @param ValueCondition[] $conditions The selector for the multiplier which the entities parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double.   Specifies whether all Conditions should parse their test on the specific data Key () or if only one is required ().   Specifies whether entities that don't have the specific data Key should be considered a match () or not ().
     */
    public static function create(string $key, array $conditions, ValueSelector $multiplierSelector, bool $mustMatchAllConditions = true, bool $considerAsMatchIfKeyIsNotFound = false) : ProductDataRelevanceModifier
    {
        $result = new ProductDataRelevanceModifier();
