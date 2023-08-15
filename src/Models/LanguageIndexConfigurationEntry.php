<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class LanguageIndexConfigurationEntry
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.LanguageIndexConfigurationEntry, Relewise.Client";
    public Language $language;
    public bool $included;
    /** The ISO639-1 code for the selected language, this is used for spelling correction, stemming, phonetic analysis etc.            This is optional if the specified "Language" already follows the official codes, e.g. "en" for English, "da" for Danish etc (case-insensitive).            https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes */
    public ?string $iSO639_1;
    public static function create(Language $language, bool $included, ?string $iso639_1 = Null) : LanguageIndexConfigurationEntry
    {
        $result = new LanguageIndexConfigurationEntry();
        $result->language = $language;
        $result->included = $included;
        $result->iSO639_1 = $iso639_1;
        return $result;
    }
    public static function hydrate(array $arr) : LanguageIndexConfigurationEntry
    {
        $result = new LanguageIndexConfigurationEntry();
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("included", $arr))
        {
            $result->included = $arr["included"];
        }
        if (array_key_exists("iSO639_1", $arr))
        {
            $result->iSO639_1 = $arr["iSO639_1"];
        }
        return $result;
    }
    /**
     * Sets language to a new value.
     * @param Language $language new value.
     */
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets included to a new value.
     * @param bool $included new value.
     */
    function setIncluded(bool $included)
    {
        $this->included = $included;
        return $this;
    }
    /**
     * Sets iSO639_1 to a new value.
     * @param ?string $iSO639_1 new value.
     */
    function setISO639_1(?string $iSO639_1)
    {
        $this->iSO639_1 = $iSO639_1;
        return $this;
    }
}
