<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchResultModifierRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule, Relewise.Client";
    public SearchTermCondition $condition;
    public array $actions;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, SearchTermCondition $condition, SearchResultModifierRuleRuleAction ... $actions) : SearchResultModifierRule
    {
        $result = new SearchResultModifierRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->condition = $condition;
        $result->actions = $actions;
        return $result;
    }
    public static function hydrate(array $arr) : SearchResultModifierRule
    {
        $result = SearchRule::hydrateBase(new SearchResultModifierRule(), $arr);
        if (array_key_exists("condition", $arr))
        {
            $result->condition = SearchTermCondition::hydrate($arr["condition"]);
        }
        if (array_key_exists("actions", $arr))
        {
            $result->actions = array();
            foreach($arr["actions"] as &$value)
            {
                array_push($result->actions, SearchResultModifierRuleRuleAction::hydrate($value));
            }
        }
        return $result;
    }
    function setCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    function setActions(SearchResultModifierRuleRuleAction ... $actions)
    {
        $this->actions = $actions;
        return $this;
    }
    /** @param SearchResultModifierRuleRuleAction[] $actions new value. */
    function setActionsFromArray(array $actions)
    {
        $this->actions = $actions;
        return $this;
    }
    function addToActions(SearchResultModifierRuleRuleAction $actions)
    {
        if (!isset($this->actions))
        {
            $this->actions = array();
        }
        array_push($this->actions, $actions);
        return $this;
    }
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setIndexes(?ApplicableIndexes $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    function setLanguages(?ApplicableLanguages $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function setApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    function setApprovedBy(string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }
    function setIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
}
