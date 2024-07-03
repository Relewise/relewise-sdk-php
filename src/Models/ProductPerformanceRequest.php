<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductPerformanceRequest extends AnalyzerRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Analyzers.ProductPerformanceRequest, Relewise.Client";
    public int $fromUnixTimeSeconds;
    public int $toUnixTimeSeconds;
    public ?FilterCollection $filters;
    public int $numberOfResults;
    public int $skipNumberOfResults;
    public bool $byVariant;
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    public ?SelectedVariantPropertiesSettings $selectedVariantProperties;
    public ProductPerformanceRequestOrderByOptions $orderBy;
    public ProductPerformanceRequestVariantDataOptions $variantData;
    public ?array $classifications;
    public ?SelectedBrandPropertiesSettings $selectedBrandProperties;
    public static function create(?Language $language, ?Currency $currency, bool $byVariant, int $numberOfResultsPerRequest, int $skipNumberOfResults = 0) : ProductPerformanceRequest
    {
        $result = new ProductPerformanceRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->byVariant = $byVariant;
        $result->numberOfResults = $numberOfResultsPerRequest;
        $result->skipNumberOfResults = $skipNumberOfResults;
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceRequest
    {
        $result = AnalyzerRequest::hydrateBase(new ProductPerformanceRequest(), $arr);
        if (array_key_exists("fromUnixTimeSeconds", $arr))
        {
            $result->fromUnixTimeSeconds = $arr["fromUnixTimeSeconds"];
        }
        if (array_key_exists("toUnixTimeSeconds", $arr))
        {
            $result->toUnixTimeSeconds = $arr["toUnixTimeSeconds"];
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("numberOfResults", $arr))
        {
            $result->numberOfResults = $arr["numberOfResults"];
        }
        if (array_key_exists("skipNumberOfResults", $arr))
        {
            $result->skipNumberOfResults = $arr["skipNumberOfResults"];
        }
        if (array_key_exists("byVariant", $arr))
        {
            $result->byVariant = $arr["byVariant"];
        }
        if (array_key_exists("selectedProductProperties", $arr))
        {
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        if (array_key_exists("orderBy", $arr))
        {
            $result->orderBy = ProductPerformanceRequestOrderByOptions::from($arr["orderBy"]);
        }
        if (array_key_exists("variantData", $arr))
        {
            $result->variantData = ProductPerformanceRequestVariantDataOptions::from($arr["variantData"]);
        }
        if (array_key_exists("classifications", $arr))
        {
            $result->classifications = array();
            foreach($arr["classifications"] as &$value)
            {
                array_push($result->classifications, $value);
            }
        }
        if (array_key_exists("selectedBrandProperties", $arr))
        {
            $result->selectedBrandProperties = SelectedBrandPropertiesSettings::hydrate($arr["selectedBrandProperties"]);
        }
        return $result;
    }
    function setFromUnixTimeSeconds(int $fromUnixTimeSeconds)
    {
        $this->fromUnixTimeSeconds = $fromUnixTimeSeconds;
        return $this;
    }
    function setToUnixTimeSeconds(int $toUnixTimeSeconds)
    {
        $this->toUnixTimeSeconds = $toUnixTimeSeconds;
        return $this;
    }
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function setNumberOfResults(int $numberOfResults)
    {
        $this->numberOfResults = $numberOfResults;
        return $this;
    }
    function setSkipNumberOfResults(int $skipNumberOfResults)
    {
        $this->skipNumberOfResults = $skipNumberOfResults;
        return $this;
    }
    function setByVariant(bool $byVariant)
    {
        $this->byVariant = $byVariant;
        return $this;
    }
    function setSelectedProductProperties(?SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    function setSelectedVariantProperties(?SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
    function setOrderBy(ProductPerformanceRequestOrderByOptions $orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }
    function setVariantData(ProductPerformanceRequestVariantDataOptions $variantData)
    {
        $this->variantData = $variantData;
        return $this;
    }
    function setClassifications(stringstringKeyValuePair ... $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
    /** @param ?stringstringKeyValuePair[] $classifications new value. */
    function setClassificationsFromArray(array $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
    function addToClassifications(stringstringKeyValuePair $classifications)
    {
        if (!isset($this->classifications))
        {
            $this->classifications = array();
        }
        array_push($this->classifications, $classifications);
        return $this;
    }
    function setSelectedBrandProperties(?SelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
        return $this;
    }
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
