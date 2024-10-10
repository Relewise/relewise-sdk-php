<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermModifierRuleReplaceWordsInTermAction extends SearchTermModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+ReplaceWordsInTermAction, Relewise.Client";
    public string $words;
    public ?string $replacement;
    public static function create(string $words, ?string $replacement) : SearchTermModifierRuleReplaceWordsInTermAction
    {
        $result = new SearchTermModifierRuleReplaceWordsInTermAction();
        $result->words = $words;
        $result->replacement = $replacement;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermModifierRuleReplaceWordsInTermAction
    {
        $result = SearchTermModifierRuleRuleAction::hydrateBase(new SearchTermModifierRuleReplaceWordsInTermAction(), $arr);
        if (array_key_exists("words", $arr))
        {
            $result->words = $arr["words"];
        }
        if (array_key_exists("replacement", $arr))
        {
            $result->replacement = $arr["replacement"];
        }
        return $result;
    }
    
    function setWords(string $words)
    {
        $this->words = $words;
        return $this;
    }
    
    function setReplacement(?string $replacement)
    {
        $this->replacement = $replacement;
        return $this;
    }
}
