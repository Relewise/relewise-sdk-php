<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings
{
    /** If highlights should be presented as text fragment within inspected data values. */
    public bool $includeTextSnippets;
    
    public static function create() : ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings();
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
