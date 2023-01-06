<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class LanguageIndexConfigurationEntry
{
    public Language $language;
    public bool $included;
    public string $iSO639_1;
    public static function create(Language $language, bool $included, string $iso639_1 = Null) : LanguageIndexConfigurationEntry
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
    function withLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withIncluded(bool $included)
    {
        $this->included = $included;
        return $this;
    }
    function withISO639_1(string $iSO639_1)
    {
        $this->iSO639_1 = $iSO639_1;
        return $this;
    }
}
