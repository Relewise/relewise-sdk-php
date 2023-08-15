<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets fromUnixTimeSeconds to a new value.
     * @param int $fromUnixTimeSeconds new value.
     */
    function setFromUnixTimeSeconds(int $fromUnixTimeSeconds)
    {
        $this->fromUnixTimeSeconds = $fromUnixTimeSeconds;
        return $this;
    }
    /**
     * Sets toUnixTimeSeconds to a new value.
     * @param int $toUnixTimeSeconds new value.
     */
    function setToUnixTimeSeconds(int $toUnixTimeSeconds)
    {
        $this->toUnixTimeSeconds = $toUnixTimeSeconds;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param ?FilterCollection $filters new value.
     */
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets numberOfResults to a new value.
     * @param int $numberOfResults new value.
     */
    function setNumberOfResults(int $numberOfResults)
    {
        $this->numberOfResults = $numberOfResults;
        return $this;
    }
    /**
     * Sets skipNumberOfResults to a new value.
     * @param int $skipNumberOfResults new value.
     */
    function setSkipNumberOfResults(int $skipNumberOfResults)
    {
        $this->skipNumberOfResults = $skipNumberOfResults;
        return $this;
    }
    /**
     * Sets byVariant to a new value.
     * @param bool $byVariant new value.
     */
    function setByVariant(bool $byVariant)
    {
        $this->byVariant = $byVariant;
        return $this;
    }
    /**
     * Sets selectedProductProperties to a new value.
     * @param ?SelectedProductPropertiesSettings $selectedProductProperties new value.
     */
    function setSelectedProductProperties(?SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    /**
     * Sets selectedVariantProperties to a new value.
     * @param ?SelectedVariantPropertiesSettings $selectedVariantProperties new value.
     */
    function setSelectedVariantProperties(?SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
    /**
     * Sets orderBy to a new value.
     * @param ProductPerformanceRequestOrderByOptions $orderBy new value.
     */
    function setOrderBy(ProductPerformanceRequestOrderByOptions $orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }
    /**
     * Sets variantData to a new value.
     * @param ProductPerformanceRequestVariantDataOptions $variantData new value.
     */
    function setVariantData(ProductPerformanceRequestVariantDataOptions $variantData)
    {
        $this->variantData = $variantData;
        return $this;
    }
    /**
     * Sets classifications to a new value.
     * @param ?stringstringKeyValuePair[] $classifications new value.
     */
    function setClassifications(stringstringKeyValuePair ... $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
    /**
     * Sets classifications to a new value from an array.
     * @param ?stringstringKeyValuePair[] $classifications new value.
     */
    function setClassificationsFromArray(array $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
    /**
     * Adds a new element to classifications.
     * @param stringstringKeyValuePair $classifications new element.
     */
    function addToClassifications(stringstringKeyValuePair $classifications)
    {
        if (!isset($this->classifications))
        {
            $this->classifications = array();
        }
        array_push($this->classifications, $classifications);
        return $this;
    }
    /**
     * Sets selectedBrandProperties to a new value.
     * @param ?SelectedBrandPropertiesSettings $selectedBrandProperties new value.
     */
    function setSelectedBrandProperties(?SelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
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
