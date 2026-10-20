<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

class PurchasedWithMultipleProductsRequest extends ProductRecommendationRequest implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PurchasedWithMultipleProductsRequest, Relewise.Client";
    public array $productAndVariantIds;
    
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ... $productAndVariantIds) : PurchasedWithMultipleProductsRequest
    {
        $result = new PurchasedWithMultipleProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->productAndVariantIds = $productAndVariantIds;
        return $result;
    }
    
    public static function hydrate(array $arr) : PurchasedWithMultipleProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new PurchasedWithMultipleProductsRequest(), $arr);
        if (array_key_exists("productAndVariantIds", $arr))
        {
            $result->productAndVariantIds = array();
            foreach($arr["productAndVariantIds"] as &$value)
            {
                array_push($result->productAndVariantIds, ProductAndVariantId::hydrate($value));
            }
        }
        return $result;
    }
    
    function setProductAndVariantIds(ProductAndVariantId ... $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    
    /** @param ProductAndVariantId[] $productAndVariantIds new value. */
    function setProductAndVariantIdsFromArray(array $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    
    function addToProductAndVariantIds(ProductAndVariantId $productAndVariantIds)
    {
        if (!isset($this->productAndVariantIds))
        {
            $this->productAndVariantIds = array();
        }
        array_push($this->productAndVariantIds, $productAndVariantIds);
        return $this;
    }
    
    function setSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    function addToContextValues(string $key, string $value)
    {
        if (!isset($this->contextValues))
        {
            $this->contextValues = array();
        }
        $this->contextValues[$key] = $value;
        return $this;
    }
    
    /** @param ?array<string, string> $contextValues associative array. */
    function setContextValuesFromAssociativeArray(array $contextValues)
    {
        $this->contextValues = $contextValues;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        $result = array();
        foreach ((array) $this as $name => $value)
        {
            // Private and protected property names contain a NUL byte when cast to an array.
            if (!str_contains((string) $name, "\0"))
            {
                $result[$name] = $value;
            }
        }
        if (isset($this->contextValues))
        {
            $result["contextValues"] = (object) $this->contextValues;
        }
        return (object) $result;
    }
}
