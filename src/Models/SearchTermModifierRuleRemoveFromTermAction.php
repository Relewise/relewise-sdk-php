<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermModifierRuleRemoveFromTermAction extends SearchTermModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+RemoveFromTermAction, Relewise.Client";
    public string $words;
    
    public static function create(string $words) : SearchTermModifierRuleRemoveFromTermAction
    {
        $result = new SearchTermModifierRuleRemoveFromTermAction();
        $result->words = $words;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermModifierRuleRemoveFromTermAction
    {
        $result = SearchTermModifierRuleRuleAction::hydrateBase(new SearchTermModifierRuleRemoveFromTermAction(), $arr);
        if (array_key_exists("words", $arr))
        {
            $result->words = $arr["words"];
        }
        return $result;
    }
    
    function setWords(string $words)
    {
        $this->words = $words;
        return $this;
    }
}
