<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class AnalyzerRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Analyzers.AnalyzerRequest, Relewise.Client";
    public ?Language $language;
    public ?Currency $currency;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Analyzers.ProductPerformanceRequest, Relewise.Client")
        {
            return ProductPerformanceRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
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