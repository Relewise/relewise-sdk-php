<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryView extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentCategoryView, Relewise.Client";
    public ?User $user;
    public array $idPath;
    public static function create(?User $user, string ... $idPath) : ContentCategoryView
    {
        $result = new ContentCategoryView();
        $result->user = $user;
        $result->idPath = $idPath;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryView
    {
        $result = Trackable::hydrateBase(new ContentCategoryView(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("idPath", $arr))
        {
            $result->idPath = array();
            foreach($arr["idPath"] as &$value)
            {
                array_push($result->idPath, $value);
            }
        }
        return $result;
    }
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    function setIdPath(string ... $idPath)
    {
        $this->idPath = $idPath;
        return $this;
    }
    /** @param string[] $idPath new value. */
    function setIdPathFromArray(array $idPath)
    {
        $this->idPath = $idPath;
        return $this;
    }
    function addToIdPath(string $idPath)
    {
        if (!isset($this->idPath))
        {
            $this->idPath = array();
        }
        array_push($this->idPath, $idPath);
        return $this;
    }
}
