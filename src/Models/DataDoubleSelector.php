<?php declare(strict_types=1);

namespace Relewise\Models;

class DataDoubleSelector extends ValueSelector
{
    public string $typeDefinition = "Relewise.Client.Requests.ValueSelectors.DataDoubleSelector, Relewise.Client";
    
    public string $key;
    
    public static function create(string $key) : DataDoubleSelector
    {
        $result = new DataDoubleSelector();
        $result->key = $key;
        return $result;
    }
    
    public static function hydrate(array $arr) : DataDoubleSelector
    {
        $result = ValueSelector::hydrateBase(new DataDoubleSelector(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
}
