<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentContentHighlightPropsHighlightSettingsOffsetSettings
{
    /** Whether to return match positions (offsets) within fields. */
    public bool $include;
    
    public static function create() : ContentContentHighlightPropsHighlightSettingsOffsetSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettingsOffsetSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettingsOffsetSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettingsOffsetSettings();
        if (array_key_exists("include", $arr))
        {
            $result->include = $arr["include"];
        }
        return $result;
    }
    
    /** Whether to return match positions (offsets) within fields. */
    function setInclude(bool $include)
    {
        $this->include = $include;
        return $this;
    }
}
