<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentHighlightProps extends ContentHighlightProperties
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Highlighting.ContentHighlightProps, Relewise.Client";
    public static function create() : ContentHighlightProps
    {
        $result = new ContentHighlightProps();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentHighlightProps
    {
        $result = ContentHighlightProperties::hydrateBase(new ContentHighlightProps(), $arr);
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
