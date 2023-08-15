<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserQuery extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Queries.UserQuery, Relewise.Client";
    public array $criteria;
    public ?Language $language;
    public ?Currency $currency;
    public static function create(?Language $language, ?Currency $currency, UserQueryCriteria ... $criteria) : UserQuery
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
    /**
     * Sets criteria to a new value.
     * @param UserQueryCriteria[] $criteria new value.
     */
    function setCriteria(UserQueryCriteria ... $criteria)
    {
        $this->criteria = $criteria;
        return $this;
    }
    /**
     * Sets criteria to a new value from an array.
     * @param UserQueryCriteria[] $criteria new value.
     */
    function setCriteriaFromArray(array $criteria)
    {
        $this->criteria = $criteria;
        return $this;
    }
    /**
     * Adds a new element to criteria.
     * @param UserQueryCriteria $criteria new element.
     */
    function addToCriteria(UserQueryCriteria $criteria)
    {
        if (!isset($this->criteria))
        {
            $this->criteria = array();
        }
        array_push($this->criteria, $criteria);
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
