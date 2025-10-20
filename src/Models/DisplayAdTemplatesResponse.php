<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplatesResponse extends DisplayAdTemplatestringDisplayAdTemplateEntityStateEntityResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.DisplayAdTemplatesResponse, Relewise.Client";
    public static function create(int $hits, array $hitsPerState) : DisplayAdTemplatesResponse
    {
        $result = new DisplayAdTemplatesResponse();
        $result->hits = $hits;
        $result->hitsPerState = $hitsPerState;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplatesResponse
    {
        $result = DisplayAdTemplatestringDisplayAdTemplateEntityStateEntityResponse::hydrateBase(new DisplayAdTemplatesResponse(), $arr);
        return $result;
    }
    
    function setEntities(DisplayAdTemplate ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param DisplayAdTemplate[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(DisplayAdTemplate $entities)
    {
        if (!isset($this->entities))
        {
            $this->entities = array();
        }
        array_push($this->entities, $entities);
        return $this;
    }
    
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    
    function addToHitsPerState(DisplayAdTemplateEntityState $key, int $value)
    {
        if (!isset($this->hitsPerState))
        {
            $this->hitsPerState = array();
        }
        $this->hitsPerState[$key] = $value;
        return $this;
    }
    
    /** @param array<DisplayAdTemplateEntityState, int> $hitsPerState associative array. */
    function setHitsPerStateFromAssociativeArray(array $hitsPerState)
    {
        $this->hitsPerState = $hitsPerState;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
