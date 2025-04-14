<?php declare(strict_types=1);

namespace Relewise\Models;

class HighlightResultSnippetDisplayNameSnippetMatch extends HighlightResultSnippetSnippetMatch
{
    public string $typeDefinition = "Relewise.Client.DataTypes.HighlightResult+Snippet+DisplayNameSnippetMatch, Relewise.Client";
    public static function create() : HighlightResultSnippetDisplayNameSnippetMatch
    {
        $result = new HighlightResultSnippetDisplayNameSnippetMatch();
        return $result;
    }
    
    public static function hydrate(array $arr) : HighlightResultSnippetDisplayNameSnippetMatch
    {
        $result = HighlightResultSnippetSnippetMatch::hydrateBase(new HighlightResultSnippetDisplayNameSnippetMatch(), $arr);
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
