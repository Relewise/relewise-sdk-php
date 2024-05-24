<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.BrandDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : BrandDisabledFilter
    {
        $result = new BrandDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : BrandDisabledFilter
    {
        $result = Filter::hydrateBase(new BrandDisabledFilter(), $arr);
        return $result;
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
