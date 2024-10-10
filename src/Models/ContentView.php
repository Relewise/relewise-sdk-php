<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentView extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentView, Relewise.Client";
    public ?User $user;
    public Content $content;
    public static function create(?User $user, Content $content) : ContentView
    {
        $result = new ContentView();
        $result->user = $user;
        $result->content = $content;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentView
    {
        $result = Trackable::hydrateBase(new ContentView(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("content", $arr))
        {
            $result->content = Content::hydrate($arr["content"]);
        }
        return $result;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setContent(Content $content)
    {
        $this->content = $content;
        return $this;
    }
}
