<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductHighlightProps extends ProductHighlightProperties
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Highlighting.ProductHighlightProps, Relewise.Client";
    public static function create() : ProductHighlightProps
    {
        $result = new ProductHighlightProps();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductHighlightProps
    {
        $result = ProductHighlightProperties::hydrateBase(new ProductHighlightProps(), $arr);
        return $result;
    }
    
    function setDisplayName(bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    
    /** @param string[] $dataKeys new value. */
    function setDataKeysFromArray(array $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    
    function addToDataKeys(string $dataKeys)
    {
        if (!isset($this->dataKeys))
        {
            $this->dataKeys = array();
        }
        array_push($this->dataKeys, $dataKeys);
        return $this;
    }
}
