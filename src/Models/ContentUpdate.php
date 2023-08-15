<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets content to a new value.
     * @param Content $content new value.
     */
    function setContent(Content $content)
    {
        $this->content = $content;
        return $this;
    }
    /**
     * Sets kind to a new value.
     * @param ContentUpdateUpdateKind $kind new value.
     */
    function setKind(ContentUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
