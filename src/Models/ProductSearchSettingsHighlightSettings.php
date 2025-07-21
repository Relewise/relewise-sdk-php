<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductSearchSettingsHighlightSettings extends ProductProductHighlightPropsHighlightSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ProductSearchSettings+HighlightSettings, Relewise.Client";
    public static function create() : ProductSearchSettingsHighlightSettings
    {
        $result = new ProductSearchSettingsHighlightSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductSearchSettingsHighlightSettings
    {
        $result = new ProductSearchSettingsHighlightSettings();
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("limit", $arr))
        {
            $result->limit = ProductProductHighlightPropsHighlightSettingsLimits::hydrate($arr["limit"]);
        }
        if (array_key_exists("highlightable", $arr))
        {
            $result->highlightable = ProductHighlightProps::hydrate($arr["highlightable"]);
        }
        if (array_key_exists("shape", $arr))
        {
            $result->shape = ProductProductHighlightPropsHighlightSettingsResponseShape::hydrate($arr["shape"]);
        }
        return $result;
    }
    
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    function setLimit(ProductProductHighlightPropsHighlightSettingsLimits $limit)
    {
        $this->limit = $limit;
        return $this;
    }
    
    function setHighlightable(ProductHighlightProps $highlightable)
    {
        $this->highlightable = $highlightable;
        return $this;
    }
    
    function setShape(ProductProductHighlightPropsHighlightSettingsResponseShape $shape)
    {
        $this->shape = $shape;
        return $this;
    }
}
