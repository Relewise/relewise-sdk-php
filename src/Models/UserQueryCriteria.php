<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserQueryCriteria
{
    public string $authenticatedId;
    public string $temporaryId;
    public string $email;
    public Language $language;
    public Currency $currency;
    public array $identifiers;
    public static function create() : UserQueryCriteria
    {
        $result = new UserQueryCriteria();
        return $result;
    }
    public static function hydrate(array $arr) : UserQueryCriteria
    {
        $result = new UserQueryCriteria();
        if (array_key_exists("authenticatedId", $arr))
        {
            $result->authenticatedId = $arr["authenticatedId"];
        }
        if (array_key_exists("temporaryId", $arr))
        {
            $result->temporaryId = $arr["temporaryId"];
        }
        if (array_key_exists("email", $arr))
        {
            $result->email = $arr["email"];
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("identifiers", $arr))
        {
            $result->identifiers = array();
            foreach($arr["identifiers"] as $key => $value)
            {
                $result->identifiers[$key] = $value;
            }
        }
        return $result;
    }
    function setAuthenticatedId(string $authenticatedId)
    {
        $this->authenticatedId = $authenticatedId;
        return $this;
    }
    function setTemporaryId(string $temporaryId)
    {
        $this->temporaryId = $temporaryId;
        return $this;
    }
    function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function addToIdentifiers(string $key, string $value)
    {
        if (!isset($this->identifiers))
        {
            $this->identifiers = array();
        }
        $this->identifiers[$key] = $value;
        return $this;
    }
}
