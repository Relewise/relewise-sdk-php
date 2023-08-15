<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PredictionRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.PredictionRule, Relewise.Client";
    public SearchTermCondition $condition;
    public PredictionRulePromotion $promote;
    public PredictionRuleSuppression $suppress;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, SearchTermCondition $condition) : PredictionRule
    {
        $result = new PredictionRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->condition = $condition;
        return $result;
    }
    public static function hydrate(array $arr) : PredictionRule
    {
        $result = SearchRule::hydrateBase(new PredictionRule(), $arr);
        if (array_key_exists("condition", $arr))
        {
            $result->condition = SearchTermCondition::hydrate($arr["condition"]);
        }
        if (array_key_exists("promote", $arr))
        {
            $result->promote = PredictionRulePromotion::hydrate($arr["promote"]);
        }
        if (array_key_exists("suppress", $arr))
        {
            $result->suppress = PredictionRuleSuppression::hydrate($arr["suppress"]);
        }
        return $result;
    }
    /**
     * Sets condition to a new value.
     * @param SearchTermCondition $condition new value.
     */
    function setCondition(SearchTermCondition $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    /**
     * Sets promote to a new value.
     * @param PredictionRulePromotion $promote new value.
     */
    function setPromote(PredictionRulePromotion $promote)
    {
        $this->promote = $promote;
        return $this;
    }
    /**
     * Sets suppress to a new value.
     * @param PredictionRuleSuppression $suppress new value.
     */
    function setSuppress(PredictionRuleSuppression $suppress)
    {
        $this->suppress = $suppress;
        return $this;
    }
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets indexes to a new value.
     * @param ?ApplicableIndexes $indexes new value.
     */
    function setIndexes(?ApplicableIndexes $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Sets languages to a new value.
     * @param ?ApplicableLanguages $languages new value.
     */
    function setLanguages(?ApplicableLanguages $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * Sets created to a new value.
     * @param DateTime $created new value.
     */
    function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    /**
     * Sets createdBy to a new value.
     * @param string $createdBy new value.
     */
    function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * Sets modified to a new value.
     * @param DateTime $modified new value.
     */
    function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    /**
     * Sets approved to a new value.
     * @param ?DateTime $approved new value.
     */
    function setApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    /**
     * Sets approvedBy to a new value.
     * @param string $approvedBy new value.
     */
    function setApprovedBy(string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }
    /**
     * Sets isApproved to a new value.
     * @param bool $isApproved new value.
     */
    function setIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
}
