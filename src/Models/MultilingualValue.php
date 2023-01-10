<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class MultilingualValue
{
    public Language $language;
    public ?string $text;
    public static function create(Language $language, ?string $text) : MultilingualValue
    {
        $result = new MultilingualValue();
        $result->language = $language;
        $result->text = $text;
        return $result;
    }
    public static function hydrate(array $arr) : MultilingualValue
    {
        $result = new MultilingualValue();
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("text", $arr))
        {
            $result->text = $arr["text"];
        }
        return $result;
    }
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setText(?string $text)
    {
        $this->text = $text;
        return $this;
    }
}
