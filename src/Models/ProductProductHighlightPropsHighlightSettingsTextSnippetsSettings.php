<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductProductHighlightPropsHighlightSettingsTextSnippetsSettings
{
    /** If highlights should be presented as text fragment within inspected data values. */
    public bool $includeTextSnippets;
    
    public static function create() : ProductProductHighlightPropsHighlightSettingsTextSnippetsSettings
    {
        $result = new ProductProductHighlightPropsHighlightSettingsTextSnippetsSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductProductHighlightPropsHighlightSettingsTextSnippetsSettings
    {
        $result = new ProductProductHighlightPropsHighlightSettingsTextSnippetsSettings();
        if (array_key_exists("includeTextSnippets", $arr))
        {
            $result->includeTextSnippets = $arr["includeTextSnippets"];
        }
        return $result;
    }
    
    /** If highlights should be presented as text fragment within inspected data values. */
    function setIncludeTextSnippets(bool $includeTextSnippets)
    {
        $this->includeTextSnippets = $includeTextSnippets;
        return $this;
    }
}
