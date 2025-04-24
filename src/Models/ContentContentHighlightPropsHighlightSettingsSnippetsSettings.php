<?php declare(strict_types=1);

namespace Relewise\Models;

/** Settings controlling how text snippets are returned in highlight results. */
class ContentContentHighlightPropsHighlightSettingsSnippetsSettings
{
    /** Whether to include text-based snippets. */
    public bool $include;
    /** Whether to include ellipses (...) for snippets truncated in the middle of the text. */
    public bool $useEllipses;
    /** Should indices (offsets) be included to power individual words highlight on client side. Useful for visually emphasizing the exact match among context-enriched snippets. */
    public bool $includeMatchedWords;
    
    public static function create() : ContentContentHighlightPropsHighlightSettingsSnippetsSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettingsSnippetsSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentContentHighlightPropsHighlightSettingsSnippetsSettings
    {
        $result = new ContentContentHighlightPropsHighlightSettingsSnippetsSettings();
        if (array_key_exists("include", $arr))
        {
            $result->include = $arr["include"];
        }
        if (array_key_exists("useEllipses", $arr))
        {
            $result->useEllipses = $arr["useEllipses"];
        }
        if (array_key_exists("includeMatchedWords", $arr))
        {
            $result->includeMatchedWords = $arr["includeMatchedWords"];
        }
        return $result;
    }
    
    /** Whether to include text-based snippets. */
    function setInclude(bool $include)
    {
        $this->include = $include;
        return $this;
    }
    
    /** Whether to include ellipses (...) for snippets truncated in the middle of the text. */
    function setUseEllipses(bool $useEllipses)
    {
        $this->useEllipses = $useEllipses;
        return $this;
    }
    
    /** Should indices (offsets) be included to power individual words highlight on client side. Useful for visually emphasizing the exact match among context-enriched snippets. */
    function setIncludeMatchedWords(bool $includeMatchedWords)
    {
        $this->includeMatchedWords = $includeMatchedWords;
        return $this;
    }
}
