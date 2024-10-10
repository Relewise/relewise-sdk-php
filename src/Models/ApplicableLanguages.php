<?php declare(strict_types=1);

namespace Relewise\Models;

class ApplicableLanguages
{
    public array $languages;
    const ALL = Null;
    public static function create(Language ... $languages) : ApplicableLanguages
    {
        $result = new ApplicableLanguages();
        $result->languages = $languages;
        return $result;
    }
    public static function hydrate(array $arr) : ApplicableLanguages
    {
        $result = new ApplicableLanguages();
        if (array_key_exists("languages", $arr))
        {
            $result->languages = array();
            foreach($arr["languages"] as &$value)
            {
                array_push($result->languages, Language::hydrate($value));
            }
        }
        return $result;
    }
    
    function setLanguages(Language ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    
    /** @param Language[] $languages new value. */
    function setLanguagesFromArray(array $languages)
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
}
