<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentSearchSettingsHighlightSettings extends ContentContentHighlightPropsHighlightSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ContentSearchSettings+HighlightSettings, Relewise.Client";
    public static function create() : ContentSearchSettingsHighlightSettings
    {
        $result = new ContentSearchSettingsHighlightSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentSearchSettingsHighlightSettings
    {
        $result = new ContentSearchSettingsHighlightSettings();
        return $result;
    }
    
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    function setLimit(ContentContentHighlightPropsHighlightSettingsLimits $limit)
    {
        $this->limit = $limit;
        return $this;
    }
    
    function setHighlightable(ContentHighlightProps $highlightable)
    {
        $this->highlightable = $highlightable;
        return $this;
    }
    
    function setShape(ContentContentHighlightPropsHighlightSettingsResponseShape $shape)
    {
        $this->shape = $shape;
        return $this;
    }
}
