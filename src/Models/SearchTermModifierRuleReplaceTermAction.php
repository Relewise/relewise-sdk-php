<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermModifierRuleReplaceTermAction extends SearchTermModifierRuleRuleAction
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule+ReplaceTermAction, Relewise.Client";
    public ?string $replacement;
    public static function create(?string $replacement) : SearchTermModifierRuleReplaceTermAction
    {
        $result = new SearchTermModifierRuleReplaceTermAction();
        $result->replacement = $replacement;
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermModifierRuleReplaceTermAction
    {
        $result = SearchTermModifierRuleRuleAction::hydrateBase(new SearchTermModifierRuleReplaceTermAction(), $arr);
        if (array_key_exists("replacement", $arr))
        {
            $result->replacement = $arr["replacement"];
        }
        return $result;
    }
    function setReplacement(?string $replacement)
    {
        $this->replacement = $replacement;
        return $this;
    }
}
