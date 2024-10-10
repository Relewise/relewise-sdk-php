<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentUpdate extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentUpdate, Relewise.Client";
    public Content $content;
    public ContentUpdateUpdateKind $kind;
    
    public static function create(Content $content, ContentUpdateUpdateKind $kind = ContentUpdateUpdateKind::UpdateAndAppend) : ContentUpdate
    {
        $result = new ContentUpdate();
        $result->content = $content;
        $result->kind = $kind;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentUpdate
    {
        $result = Trackable::hydrateBase(new ContentUpdate(), $arr);
        if (array_key_exists("content", $arr))
        {
            $result->content = Content::hydrate($arr["content"]);
        }
        if (array_key_exists("kind", $arr))
        {
            $result->kind = ContentUpdateUpdateKind::from($arr["kind"]);
        }
        return $result;
    }
    
    function setContent(Content $content)
    {
        $this->content = $content;
        return $this;
    }
    
    function setKind(ContentUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
