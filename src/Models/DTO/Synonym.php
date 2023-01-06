<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
            $result->created = $arr["created"];
        }
        if (array_key_exists("createdBy", $arr))
        {
            $result->createdBy = $arr["createdBy"];
        }
        if (array_key_exists("modified", $arr))
        {
            $result->modified = $arr["modified"];
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
            $result->approved = $arr["approved"];
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
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withType(SynonymType $type)
    {
        $this->type = $type;
        return $this;
    }
    function withIndexes(string ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    function withLanguages(Language ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function withCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }
    function withCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    function withModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withFrom(string ... $from)
    {
        $this->from = $from;
        return $this;
    }
    function withWords(string ... $words)
    {
        $this->words = $words;
        return $this;
    }
    function withApproved(?DateTime $approved)
    {
        $this->approved = $approved;
        return $this;
    }
    function withApprovedBy(string $approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }
    function withUsages(int $usages)
    {
        $this->usages = $usages;
        return $this;
    }
    function withIsApproved(bool $isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }
    function withAllowInPredictions(bool $allowInPredictions)
    {
        $this->allowInPredictions = $allowInPredictions;
        return $this;
    }
}
