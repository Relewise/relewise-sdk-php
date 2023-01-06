<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentIdFilter, Relewise.Client";
    public array $contentIds;
    public static function create(bool $negated = false) : ContentIdFilter
    {
        $result = new ContentIdFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ContentIdFilter
    {
        $result = Filter::hydrateBase(new ContentIdFilter(), $arr);
        if (array_key_exists("contentIds", $arr))
        {
            $result->contentIds = array();
            foreach($arr["contentIds"] as &$value)
            {
                array_push($result->contentIds, $value);
            }
        }
        return $result;
    }
    function withContentIds(string ... $contentIds)
    {
        $this->contentIds = $contentIds;
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
