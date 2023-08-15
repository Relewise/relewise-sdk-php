<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Synonym
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Synonyms.Synonym, Relewise.Client";
    public string $id;
    public SynonymType $type;
    public array $indexes;
    public array $languages;
    public DateTime $created;
    public string $createdBy;
    public DateTime $modified;
    public string $modifiedBy;
    public array $from;
    public array $words;
    public ?DateTime $approved;
    public string $approvedBy;
    public int $usages;
    public bool $isApproved;
    public bool $allowInPredictions;
    public static function create() : Synonym
    {
        $result = new Synonym();
        return $result;
    }
    public static function hydrate(array $arr) : Synonym
    {
        $result = new Synonym();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = SynonymType::from($arr["type"]);
        }
        if (array_key_exists("indexes", $arr))
        {
            $result->indexes = array();
            foreach($arr["indexes"] as &$value)
            {
                array_push($result->indexes, $value);
            }
        }
        if (array_key_exists("languages", $arr))
        {
            $result->languages = array();
            foreach($arr["languages"] as &$value)
            {
                array_push($result->languages, Language::hydrate($value));
            }
        }
        if (array_key_exists("created", $arr))
        {
            $result->created = new DateTime($arr["created"]);
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = new DateTime($arr["modified"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        if (array_key_exists("from", $arr))
        {
            $result->from = array();
            foreach($arr["from"] as &$value)
            {
                array_push($result->from, $value);
            }
        }
        if (array_key_exists("words", $arr))
        {
            $result->words = array();
            foreach($arr["words"] as &$value)
            {
                array_push($result->words, $value);
            }
        }
        if (array_key_exists("approved", $arr))
        {
            $result->approved = new DateTime($arr["approved"]);
        }
        if (array_key_exists("approvedBy", $arr))
        {
            $result->approvedBy = $arr["approvedBy"];
        }
        if (array_key_exists("usages", $arr))
        {
            $result->usages = $arr["usages"];
        }
        if (array_key_exists("isApproved", $arr))
        {
            $result->isApproved = $arr["isApproved"];
        }
        if (array_key_exists("allowInPredictions", $arr))
        {
            $result->allowInPredictions = $arr["allowInPredictions"];
        }
        return $result;
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
     * Sets type to a new value.
     * @param SynonymType $type new value.
     */
    function setType(SynonymType $type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Sets indexes to a new value.
     * @param string[] $indexes new value.
     */
    function setIndexes(string ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Sets indexes to a new value from an array.
     * @param string[] $indexes new value.
     */
    function setIndexesFromArray(array $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Adds a new element to indexes.
     * @param string $indexes new element.
     */
    function addToIndexes(string $indexes)
    {
        if (!isset($this->indexes))
        {
            $this->indexes = array();
        }
        array_push($this->indexes, $indexes);
        return $this;
    }
    /**
     * Sets languages to a new value.
     * @param Language[] $languages new value.
     */
    function setLanguages(Language ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * Sets languages to a new value from an array.
     * @param Language[] $languages new value.
     */
    function setLanguagesFromArray(array $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * Adds a new element to languages.
     * @param Language $languages new element.
     */
    function addToLanguages(Language $languages)
    {
        if (!isset($this->languages))
        {
            $this->languages = array();
        }
        array_push($this->languages, $languages);
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
     * Sets from to a new value.
     * @param string[] $from new value.
     */
    function setFrom(string ... $from)
    {
        $this->from = $from;
        return $this;
    }
    /**
     * Sets from to a new value from an array.
     * @param string[] $from new value.
     */
    function setFromFromArray(array $from)
    {
        $this->from = $from;
        return $this;
    }
    /**
     * Adds a new element to from.
     * @param string $from new element.
     */
    function addToFrom(string $from)
    {
        if (!isset($this->from))
        {
            $this->from = array();
        }
        array_push($this->from, $from);
        return $this;
    }
    /**
     * Sets words to a new value.
     * @param string[] $words new value.
     */
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
     * Sets usages to a new value.
     * @param int $usages new value.
     */
    function setUsages(int $usages)
    {
        $this->usages = $usages;
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
    /**
     * Sets allowInPredictions to a new value.
     * @param bool $allowInPredictions new value.
     */
    function setAllowInPredictions(bool $allowInPredictions)
    {
        $this->allowInPredictions = $allowInPredictions;
        return $this;
    }
}
