<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : VariantDisabledFilter
    {
        $result = new VariantDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantDisabledFilter
    {
        $result = Filter::hydrateBase(new VariantDisabledFilter(), $arr);
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
