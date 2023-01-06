<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchTerm extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.SearchTerm, Relewise.Client";
    public Language $language;
    public User $user;
    public string $term;
    public static function create(Language $language, User $user, string $term) : SearchTerm
    {
        $result = new SearchTerm();
        $result->language = $language;
        $result->user = $user;
        $result->term = $term;
        return $result;
    }
    public static function hydrate(array $arr) : SearchTerm
    {
        $result = Trackable::hydrateBase(new SearchTerm(), $arr);
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        return $result;
    }
    function withLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    function withTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}