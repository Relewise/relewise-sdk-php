<?php declare(strict_types=1);

namespace Relewise\Models;

/** Indicates how the highlight result should be shaped or presented. */
class ContentContentHighlightPropsHighlightSettingsResponseShape
{
    /** Whether to return match positions (offsets) within fields. */
    public ?ContentContentHighlightPropsHighlightSettingsOffsetSettings $offsets;
    /** Controls whether to return context-based text snippets; can include further snippet configuration. */
    public ?ContentContentHighlightPropsHighlightSettingsSnippetsSettings $snippets;
    
    public static function create() : ContentContentHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ContentContentHighlightPropsHighlightSettingsResponseShape();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettingsResponseShape
    {
        $result = new ContentContentHighlightPropsHighlightSettingsResponseShape();
        if (array_key_exists("offsets", $arr))
        {
            $result->offsets = ContentContentHighlightPropsHighlightSettingsOffsetSettings::hydrate($arr["offsets"]);
        }
        if (array_key_exists("snippets", $arr))
        {
            $result->snippets = ContentContentHighlightPropsHighlightSettingsSnippetsSettings::hydrate($arr["snippets"]);
        }
        return $result;
    }
    
    /** Whether to return match positions (offsets) within fields. */
    function setOffsets(?ContentContentHighlightPropsHighlightSettingsOffsetSettings $offsets)
    {
        $this->offsets = $offsets;
        return $this;
    }
    
    /** Controls whether to return context-based text snippets; can include further snippet configuration. */
    function setSnippets(?ContentContentHighlightPropsHighlightSettingsSnippetsSettings $snippets)
    {
        $this->snippets = $snippets;
        return $this;
    }
}
