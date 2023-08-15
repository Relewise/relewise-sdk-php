<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryView extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryView, Relewise.Client";
    public ?User $user;
    public array $idPath;
    public static function create(?User $user, string ... $idPath) : ProductCategoryView
    {
        $result = new ProductCategoryView();
        $result->user = $user;
        $result->idPath = $idPath;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryView
    {
        $result = Trackable::hydrateBase(new ProductCategoryView(), $arr);
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
    /**
     * Sets user to a new value.
     * @param ?User $user new value.
     */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets idPath to a new value.
     * @param string[] $idPath new value.
     */
    function setIdPath(string ... $idPath)
    {
        $this->idPath = $idPath;
        return $this;
    }
    /**
     * Sets idPath to a new value from an array.
     * @param string[] $idPath new value.
     */
    function setIdPathFromArray(array $idPath)
    {
        $this->idPath = $idPath;
        return $this;
    }
    /**
     * Adds a new element to idPath.
     * @param string $idPath new element.
     */
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
