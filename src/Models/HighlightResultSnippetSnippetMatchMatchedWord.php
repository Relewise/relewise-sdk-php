<?php declare(strict_types=1);

namespace Relewise\Models;

class HighlightResultSnippetSnippetMatchMatchedWord
{
    public ?intRange $offset;
    
    public static function create() : HighlightResultSnippetSnippetMatchMatchedWord
    {
        $result = new HighlightResultSnippetSnippetMatchMatchedWord();
        return $result;
    }
    
    public static function hydrate(array $arr) : HighlightResultSnippetSnippetMatchMatchedWord
    {
        $result = new HighlightResultSnippetSnippetMatchMatchedWord();
        if (array_key_exists("offset", $arr))
        {
            $result->offset = intRange::hydrate($arr["offset"]);
        }
        return $result;
    }
    
    function setOffset(?intRange $offset)
    {
        $this->offset = $offset;
        return $this;
    }
}
