<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class DataFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataFilter, Relewise.Client";
    public string $key;
    public bool $filterOutIfKeyIsNotFound;
    public bool $mustMatchAllConditions;
    public ?ValueConditionCollection $conditions;
    public ?Language $language;
    public ?Currency $currency;
    public ?array $objectPath;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.BrandDataFilter, Relewise.Client")
        {
            return BrandDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryDataFilter, Relewise.Client")
        {
            return ContentCategoryDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentDataFilter, Relewise.Client")
        {
            return ContentDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryDataFilter, Relewise.Client")
        {
            return ProductCategoryDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductDataFilter, Relewise.Client")
        {
            return ProductDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantDataFilter, Relewise.Client")
        {
            return VariantDataFilter::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Filter::hydrateBase($result, $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("filterOutIfKeyIsNotFound", $arr))
        {
            $result->filterOutIfKeyIsNotFound = $arr["filterOutIfKeyIsNotFound"];
        }
        if (array_key_exists("mustMatchAllConditions", $arr))
        {
            $result->mustMatchAllConditions = $arr["mustMatchAllConditions"];
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ValueConditionCollection::hydrate($arr["conditions"]);
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("objectPath", $arr))
        {
            $result->objectPath = array();
            foreach($arr["objectPath"] as &$value)
            {
                array_push($result->objectPath, $value);
            }
        }
        return $result;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withFilterOutIfKeyIsNotFound(bool $filterOutIfKeyIsNotFound)
    {
        $this->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $this;
    }
    function withMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    function withConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function withLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
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
