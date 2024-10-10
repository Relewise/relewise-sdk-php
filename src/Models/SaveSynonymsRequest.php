<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveSynonymsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SaveSynonymsRequest, Relewise.Client";
    
    public array $synonyms;
    public string $modifiedBy;
    
    public static function create(array $synonyms, string $modifiedBy) : SaveSynonymsRequest
    {
        $result = new SaveSynonymsRequest();
        $result->synonyms = $synonyms;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveSynonymsRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveSynonymsRequest(), $arr);
        if (array_key_exists("synonyms", $arr))
        {
            $result->synonyms = array();
            foreach($arr["synonyms"] as &$value)
            {
                array_push($result->synonyms, Synonym::hydrate($value));
            }
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    
    function setSynonyms(Synonym ... $synonyms)
    {
        $this->synonyms = $synonyms;
        return $this;
    }
    
    /** @param Synonym[] $synonyms new value. */
    function setSynonymsFromArray(array $synonyms)
    {
        $this->synonyms = $synonyms;
        return $this;
    }
    
    function addToSynonyms(Synonym $synonyms)
    {
        if (!isset($this->synonyms))
        {
            $this->synonyms = array();
        }
        array_push($this->synonyms, $synonyms);
        return $this;
    }
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
