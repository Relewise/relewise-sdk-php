<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermModifierRuleAppendToTermAction extends SearchTermModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+AppendToTermAction, Relewise.Client";
    public string $words;
    public static function create(string $words) : SearchTermModifierRuleAppendToTermAction
    {
        $result = new SearchTermModifierRuleAppendToTermAction();
        $result->words = $words;
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermModifierRuleAppendToTermAction
    {
        $result = SearchTermModifierRuleRuleAction::hydrateBase(new SearchTermModifierRuleAppendToTermAction(), $arr);
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
