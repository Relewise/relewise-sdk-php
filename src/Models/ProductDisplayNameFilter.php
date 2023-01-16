<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDisplayNameFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductDisplayNameFilter, Relewise.Client";
    public ?Language $language;
    public ?ValueConditionCollection $conditions;
    public bool $mustMatchAllConditions;
    public static function create(?Language $language = Null) : ProductDisplayNameFilter
    {
        $result = new ProductDisplayNameFilter();
        $result->language = $language;
        $result->mustMatchAllConditions = true;
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
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
