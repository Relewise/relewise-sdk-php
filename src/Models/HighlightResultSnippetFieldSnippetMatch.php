<?php declare(strict_types=1);

namespace Relewise\Models;

class HighlightResultSnippetFieldSnippetMatch extends HighlightResultSnippetSnippetMatch
{
    public string $typeDefinition = "Relewise.Client.DataTypes.HighlightResult+Snippet+FieldSnippetMatch, Relewise.Client";
    public static function create() : HighlightResultSnippetFieldSnippetMatch
    {
        $result = new HighlightResultSnippetFieldSnippetMatch();
        return $result;
    }
    
    public static function hydrate(array $arr) : HighlightResultSnippetFieldSnippetMatch
    {
        $result = HighlightResultSnippetSnippetMatch::hydrateBase(new HighlightResultSnippetFieldSnippetMatch(), $arr);
        return $result;
    }
    
    function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }
    
    function setMatchedWords(HighlightResultSnippetSnippetMatchMatchedWord ... $matchedWords)
    {
        $this->matchedWords = $matchedWords;
        return $this;
    }
    
    /** @param ?HighlightResultSnippetSnippetMatchMatchedWord[] $matchedWords new value. */
    function setMatchedWordsFromArray(array $matchedWords)
    {
        $this->matchedWords = $matchedWords;
        return $this;
    }
    
    function addToMatchedWords(HighlightResultSnippetSnippetMatchMatchedWord $matchedWords)
    {
        if (!isset($this->matchedWords))
        {
            $this->matchedWords = array();
        }
        array_push($this->matchedWords, $matchedWords);
        return $this;
    }
}
