<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class HighlightResultSnippetSnippetMatch
{
    public string $typeDefinition = "";
    public string $text;
    public ?array $matchedWords;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.HighlightResult+Snippet+DisplayNameSnippetMatch, Relewise.Client")
        {
            return HighlightResultSnippetDisplayNameSnippetMatch::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.HighlightResult+Snippet+FieldSnippetMatch, Relewise.Client")
        {
            return HighlightResultSnippetFieldSnippetMatch::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("text", $arr))
        {
            $result->text = $arr["text"];
        }
        if (array_key_exists("matchedWords", $arr))
        {
            $result->matchedWords = array();
            foreach($arr["matchedWords"] as &$value)
            {
                array_push($result->matchedWords, HighlightResultSnippetSnippetMatchMatchedWord::hydrate($value));
            }
        }
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
