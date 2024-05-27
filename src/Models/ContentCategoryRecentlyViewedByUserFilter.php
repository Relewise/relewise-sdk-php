<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryRecentlyViewedByUserFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryRecentlyViewedByUserFilter, Relewise.Client";
    public ?DateTime $sinceUtc;
    public ?int $sinceMinutesAgo;
    public static function create(bool $negated = false) : ContentCategoryRecentlyViewedByUserFilter
    {
        $result = new ContentCategoryRecentlyViewedByUserFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryRecentlyViewedByUserFilter
    {
        $result = Filter::hydrateBase(new ContentCategoryRecentlyViewedByUserFilter(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    function setSinceMinutesAgo(?int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
