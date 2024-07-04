<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class Budget
{
    public string $typeDefinition = "";
    public ?float $maxTotalCost;
    public float $totalCost;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.CPMBudget, Relewise.Client")
        {
            return CPMBudget::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("maxTotalCost", $arr))
        {
            $result->maxTotalCost = $arr["maxTotalCost"];
        }
        if (array_key_exists("totalCost", $arr))
        {
            $result->totalCost = $arr["totalCost"];
        }
        return $result;
    }
    function setMaxTotalCost(?float $maxTotalCost)
    {
        $this->maxTotalCost = $maxTotalCost;
        return $this;
    }
    function setTotalCost(float $totalCost)
    {
        $this->totalCost = $totalCost;
        return $this;
    }
}
