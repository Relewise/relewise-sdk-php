<?php declare(strict_types=1);

namespace Relewise\Models;

/** a UserCondition that checks whether one of the User's Companys's data-bag has a Key whose value satisfies the provided Conditions. */
class HasCompanyDataCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasCompanyDataCondition, Relewise.Client";
    /** The key that must be found in one of the User's Companys's data-bag for the UserCondition to be satisfied. */
    public string $key;
    /** The conditions that must be satisfied for the DataValue found at the Key in the Company's data-bag. */
    public ?ValueConditionCollection $conditions;
    /** Specifies which of the companies associated to the User it should check the data of. It defaults to ImmediateCompany. */
    public CompanyScope $evaluationScope;
    
    public static function create(string $key, ?ValueConditionCollection $conditions = Null, CompanyScope $evaluationScope = CompanyScope::ImmediateCompany, bool $negated = false) : HasCompanyDataCondition
    {
        $result = new HasCompanyDataCondition();
        $result->key = $key;
        $result->conditions = $conditions;
        $result->evaluationScope = $evaluationScope;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : HasCompanyDataCondition
    {
        $result = UserCondition::hydrateBase(new HasCompanyDataCondition(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ValueConditionCollection::hydrate($arr["conditions"]);
        }
        if (array_key_exists("evaluationScope", $arr))
        {
            $result->evaluationScope = CompanyScope::from($arr["evaluationScope"]);
        }
        return $result;
    }
    
    /** The key that must be found in one of the User's Companys's data-bag for the UserCondition to be satisfied. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The conditions that must be satisfied for the DataValue found at the Key in the Company's data-bag. */
    function setConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    /** Specifies which of the companies associated to the User it should check the data of. It defaults to ImmediateCompany. */
    function setEvaluationScope(CompanyScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
