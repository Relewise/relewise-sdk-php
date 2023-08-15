<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DecompoundRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.DecompoundRule, Relewise.Client";
    public string $word;
    public ?string $head;
    public ?array $modifiers;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, string $word, ?string $head, string ... $modifiers) : DecompoundRule
    {
        $result = new DecompoundRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->word = $word;
        $result->head = $head;
        $result->modifiers = $modifiers;
        return $result;
    }
    public static function hydrate(array $arr) : DecompoundRule
    {
        $result = SearchRule::hydrateBase(new DecompoundRule(), $arr);
        if (array_key_exists("word", $arr))
        {
            $result->word = $arr["word"];
        }
        if (array_key_exists("head", $arr))
        {
            $result->head = $arr["head"];
        }
        if (array_key_exists("modifiers", $arr))
        {
            $result->modifiers = array();
            foreach($arr["modifiers"] as &$value)
            {
                array_push($result->modifiers, $value);
            }
        }
        return $result;
    }
    /**
     * Sets word to a new value.
     * @param string $word new value.
     */
    function setWord(string $word)
    {
        $this->word = $word;
        return $this;
    }
    /**
     * Sets head to a new value.
     * @param ?string $head new value.
     */
    function setHead(?string $head)
    {
        $this->head = $head;
        return $this;
    }
    /**
     * Sets modifiers to a new value.
     * @param ?string[] $modifiers new value.
     */
    function setModifiers(string ... $modifiers)
    {
        $this->modifiers = $modifiers;
        return $this;
    }
    /**
     * Sets modifiers to a new value from an array.
     * @param ?string[] $modifiers new value.
     */
    function setModifiersFromArray(array $modifiers)
    {
        $this->modifiers = $modifiers;
        return $this;
    }
    /**
     * Adds a new element to modifiers.
     * @param string $modifiers new element.
     */
    function addToModifiers(string $modifiers)
    {
        if (!isset($this->modifiers))
        {
            $this->modifiers = array();
        }
        array_push($this->modifiers, $modifiers);
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
