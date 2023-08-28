<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setContentIds(string ... $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    /** @param string[] $contentIds new value. */
    function setContentIdsFromArray(array $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    function addToContentIds(string $contentIds)
    {
        if (!isset($this->contentIds))
        {
            $this->contentIds = array();
        }
        array_push($this->contentIds, $contentIds);
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
