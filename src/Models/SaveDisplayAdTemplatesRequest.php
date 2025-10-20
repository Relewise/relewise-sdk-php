<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveDisplayAdTemplatesRequest extends DisplayAdTemplatestringSaveEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.SaveDisplayAdTemplatesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveDisplayAdTemplatesRequest
    {
        $result = new SaveDisplayAdTemplatesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveDisplayAdTemplatesRequest
    {
        $result = DisplayAdTemplatestringSaveEntitiesRequest::hydrateBase(new SaveDisplayAdTemplatesRequest(), $arr);
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
