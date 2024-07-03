<?php declare(strict_types=1);

namespace Relewise\Models;

class LanguageIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.LanguageIndexConfiguration, Relewise.Client";
    public array $languages;
    public static function create() : LanguageIndexConfiguration
    {
        $result = new LanguageIndexConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : LanguageIndexConfiguration
    {
        $result = new LanguageIndexConfiguration();
        if (array_key_exists("languages", $arr))
        {
            $result->languages = array();
            foreach($arr["languages"] as &$value)
            {
                array_push($result->languages, LanguageIndexConfigurationEntry::hydrate($value));
            }
        }
        return $result;
    }
    function setLanguages(LanguageIndexConfigurationEntry ... $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    /** @param LanguageIndexConfigurationEntry[] $languages new value. */
    function setLanguagesFromArray(array $languages)
    {
        $this->languages = $languages;
        return $this;
    }
    function addToLanguages(LanguageIndexConfigurationEntry $languages)
    {
        if (!isset($this->languages))
        {
            $this->languages = array();
        }
        array_push($this->languages, $languages);
        return $this;
    }
}
