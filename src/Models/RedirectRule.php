<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RedirectRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.RedirectRule, Relewise.Client";
    public SearchTermCondition $condition;
    public ?string $destination;
    public ?array $data;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, SearchTermCondition $condition, ?string $destination, ?array $data = Null) : RedirectRule
    {
        $result = new RedirectRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->condition = $condition;
        $result->destination = $destination;
        $result->data = $data;
        return $result;
    }
    public static function hydrate(array $arr) : RedirectRule
    {
        $result = SearchRule::hydrateBase(new RedirectRule(), $arr);
        if (array_key_exists("condition", $arr))
        {
            $result->condition = SearchTermCondition::hydrate($arr["condition"]);
        }
        if (array_key_exists("destination", $arr))
        {
            $result->destination = $arr["destination"];
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = $value;
            }
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
     * Sets destination to a new value.
     * @param ?string $destination new value.
     */
    function setDestination(?string $destination)
    {
        $this->destination = $destination;
        return $this;
    }
    /**
     * Sets the value of a specific key in data.
     * @param string $key index.
     * @param string $value new value.
     */
    function addToData(string $key, string $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /**
     * Sets data to a new value.
     * @param ?array<string, string> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
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
