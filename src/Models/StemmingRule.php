<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class StemmingRule extends SearchRule
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.StemmingRule, Relewise.Client";
    public array $words;
    public ?string $stem;
    public static function create(string $id, ?ApplicableIndexes $indexes, ?ApplicableLanguages $languages, bool $isApproved, array $words, ?string $stem) : StemmingRule
    {
        $result = new StemmingRule();
        $result->id = $id;
        $result->indexes = $indexes;
        $result->languages = $languages;
        $result->isApproved = $isApproved;
        $result->words = $words;
        $result->stem = $stem;
        return $result;
    }
    public static function hydrate(array $arr) : StemmingRule
    {
        $result = SearchRule::hydrateBase(new StemmingRule(), $arr);
        if (array_key_exists("words", $arr))
        {
            $result->words = array();
            foreach($arr["words"] as &$value)
            {
                array_push($result->words, $value);
            }
        }
        if (array_key_exists("stem", $arr))
        {
            $result->stem = $arr["stem"];
        }
        return $result;
    }
    function setWords(string ... $words)
    {
        $this->words = $words;
        return $this;
    }
    /**
     * Sets words to a new value from an array.
     * @param string[] $words new value.
     */
    function setWordsFromArray(array $words)
    {
        $this->words = $words;
        return $this;
    }
    /**
     * Adds a new element to words.
     * @param string $words new element.
     */
    function addToWords(string $words)
    {
        if (!isset($this->words))
        {
            $this->words = array();
        }
        array_push($this->words, $words);
        return $this;
    }
    function setStem(?string $stem)
    {
        $this->stem = $stem;
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
