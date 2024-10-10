<?php declare(strict_types=1);

namespace Relewise\Models;

class CPMBudget extends Budget
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CPMBudget, Relewise.Client";
    public float $costPerMille;
    public static function create(float $costPerMille, ?float $maxTotalCost) : CPMBudget
    {
        $result = new CPMBudget();
        $result->costPerMille = $costPerMille;
        $result->maxTotalCost = $maxTotalCost;
        return $result;
    }
    public static function hydrate(array $arr) : CPMBudget
    {
        $result = Budget::hydrateBase(new CPMBudget(), $arr);
        if (array_key_exists("costPerMille", $arr))
        {
            $result->costPerMille = $arr["costPerMille"];
        }
        return $result;
    }
    
    function setCostPerMille(float $costPerMille)
    {
        $this->costPerMille = $costPerMille;
        return $this;
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
