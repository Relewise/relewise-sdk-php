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
    function setWord(string $word)
    {
        $this->word = $word;
        return $this;
    }
    function setHead(?string $head)
    {
        $this->head = $head;
        return $this;
    }
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
    function addToModifiers(string $modifiers)
    {
        if (!isset($this->modifiers))
        {
            $this->modifiers = array();
        }
        array_push($this->modifiers, $modifiers);
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
