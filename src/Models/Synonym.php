<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Synonym
{
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
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function setType(SynonymType $type)
    {
        $this->type = $type;
        return $this;
    }
    function setIndexes(string ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    function addToIndexes(string $indexes)
    {
        if (!isset($this->indexes))
        {
            $this->indexes = array();
        }
        array_push($this->indexes, $indexes);
        return $this;
    }
    function setLanguages(Language ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function addToLanguages(Language $languages)
    {
        if (!isset($this->languages))
        {
            $this->languages = array();
        }
        array_push($this->languages, $languages);
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
    function setFrom(string ... $from)
    {
        $this->from = $from;
        return $this;
    }
    function addToFrom(string $from)
    {
        if (!isset($this->from))
        {
            $this->from = array();
        }
        array_push($this->from, $from);
        return $this;
    }
    function setWords(string ... $words)
    {
        $this->words = $words;
        return $this;
    }
    function addToWords(string $words)
    {
        if (!isset($this->words))
        {
            $this->words = array();
        }
        array_push($this->words, $words);
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
    function setUsages(int $usages)
    {
        $this->usages = $usages;
        return $this;
    }
    function setIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
    function setAllowInPredictions(bool $allowInPredictions)
    {
        $this->allowInPredictions = $allowInPredictions;
        return $this;
    }
}
