<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentContentHighlightPropsHighlightSettingsResponseShape
{
    /** If highlights should be presented as offsets/indices within inspected data values. */
    public bool $includeOffsets;
    /** If highlights should be presented as text fragment within inspected data values; and if so, additional configuration on how to. */
    public ?ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings $textSnippets;
    
    public static function create() : ContentContentHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ContentContentHighlightPropsHighlightSettingsResponseShape();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ContentContentHighlightPropsHighlightSettingsResponseShape();
        if (array_key_exists("includeOffsets", $arr))
        {
            $result->includeOffsets = $arr["includeOffsets"];
        }
        if (array_key_exists("textSnippets", $arr))
        {
            $result->textSnippets = ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings::hydrate($arr["textSnippets"]);
        }
        return $result;
    }
    
    /** If highlights should be presented as offsets/indices within inspected data values. */
    function setIncludeOffsets(bool $includeOffsets)
    {
        $this->includeOffsets = $includeOffsets;
        return $this;
    }
    
    /** If highlights should be presented as text fragment within inspected data values; and if so, additional configuration on how to. */
    function setTextSnippets(?ContentContentHighlightPropsHighlightSettingsTextSnippetsSettings $textSnippets)
    {
        $this->textSnippets = $textSnippets;
        return $this;
    }
}
