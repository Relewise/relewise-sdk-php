<?php declare(strict_types=1);

namespace Relewise\Models;

/** a selector that uses a Key to pick a value from an entity's data to change the weighing of an observed view or purchase when making a PopularProductsRequest. */
class DataKeyPopularityMultiplierSelector extends PopularityMultiplierSelector
{
    public string $typeDefinition = "Relewise.Client.Requests.PopularityMultiplierSelectors.DataKeyPopularityMultiplierSelector, Relewise.Client";
    /** The data key that will be used to select a factor that is applied to the entities observed views or purchases. */
    public string $key;
    
    /**
     * Creates a selector that uses a Key to pick a value from an entity's data to change the weighing of an observed view or purchase when making a PopularProductsRequest.
     * @param string $key The data key that will be used to select a factor that is applied to the entities observed views or purchases.
     */
    public static function create(string $key) : DataKeyPopularityMultiplierSelector
    {
        $result = new DataKeyPopularityMultiplierSelector();
        $result->key = $key;
        return $result;
    }
    
    public static function hydrate(array $arr) : DataKeyPopularityMultiplierSelector
    {
        $result = PopularityMultiplierSelector::hydrateBase(new DataKeyPopularityMultiplierSelector(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    
    /** The data key that will be used to select a factor that is applied to the entities observed views or purchases. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
}
