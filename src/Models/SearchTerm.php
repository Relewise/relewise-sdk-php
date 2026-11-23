<?php declare(strict_types=1);

namespace Relewise\Models;

/** Records a search term entered by a user. */
class SearchTerm extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.SearchTerm, Relewise.Client";
    /** The language of the search. Its value must contain a non-whitespace character. */
    public Language $language;
    /** The user who entered the search term, if known. */
    public User $user;
    /** The text entered by the user. It must contain a non-whitespace character. */
    public string $term;
    
    /**
     * Creates a search term for tracking.
     * @param Language $language The language of the search.
     * @param User $user The user who entered the search term, if known.
     * @param string $term The text entered by the user.
     */
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
    
    /** The language of the search. Its value must contain a non-whitespace character. */
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    /** The user who entered the search term, if known. */
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    /** The text entered by the user. It must contain a non-whitespace character. */
    function setTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
}
