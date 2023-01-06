<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDisplayNameFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductDisplayNameFilter, Relewise.Client";
    public ?Language $language;
    public ?ValueConditionCollection $conditions;
    public bool $mustMatchAllConditions;
    public static function create(ValueConditionCollection $conditions, bool $mustMatchAllConditions = true, ?Language $language) : ProductDisplayNameFilter
    {
        $result = new ProductDisplayNameFilter();
        $result->conditions = $conditions;
        $result->mustMatchAllConditions = $mustMatchAllConditions;
        $result->language = $language;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDisplayNameFilter
    {
        $result = Filter::hydrateBase(new ProductDisplayNameFilter(), $arr);
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ValueConditionCollection::hydrate($arr["conditions"]);
        }
        if (array_key_exists("mustMatchAllConditions", $arr))
        {
            $result->mustMatchAllConditions = $arr["mustMatchAllConditions"];
        }
        return $result;
    }
    function withLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function withMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
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
