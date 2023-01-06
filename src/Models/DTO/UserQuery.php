<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class UserQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.UserQuery, Relewise.Client";
    public array $criteria;
    public Language $language;
    public Currency $currency;
    public static function create(Language $language, Currency $currency, UserQueryCriteria ... $criteria) : UserQuery
    {
        $result = new UserQuery();
        $result->language = $language;
        $result->currency = $currency;
        $result->criteria = $criteria;
        return $result;
    }
    public static function hydrate(array $arr) : UserQuery
    {
        $result = LicensedRequest::hydrateBase(new UserQuery(), $arr);
        if (array_key_exists("criteria", $arr))
        {
            $result->criteria = array();
            foreach($arr["criteria"] as &$value)
            {
                array_push($result->criteria, UserQueryCriteria::hydrate($value));
            }
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        return $result;
    }
    function withCriteria(UserQueryCriteria ... $criteria)
    {
        $this->criteria = $criteria;
        return $this;
    }
    function withLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withCurrency(Currency $currency)
    {
        $this->currency = $currency;
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
