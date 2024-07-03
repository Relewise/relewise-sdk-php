<?php declare(strict_types=1);

namespace Relewise\Models;

class CompanyUpdate extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CompanyUpdate, Relewise.Client";
    public Company $company;
    public CompanyUpdateUpdateKind $kind;
    public ?array $parents;
    public bool $replaceExistingParents;
    public static function create(Company $company, bool $replaceExistingParents, ?array $parents, CompanyUpdateUpdateKind $kind = CompanyUpdateUpdateKind::UpdateAndAppend) : CompanyUpdate
    {
        $result = new CompanyUpdate();
        $result->company = $company;
        $result->replaceExistingParents = $replaceExistingParents;
        $result->parents = $parents;
        $result->kind = $kind;
        return $result;
    }
    public static function hydrate(array $arr) : CompanyUpdate
    {
        $result = Trackable::hydrateBase(new CompanyUpdate(), $arr);
        if (array_key_exists("company", $arr))
        {
            $result->company = Company::hydrate($arr["company"]);
        }
        if (array_key_exists("kind", $arr))
        {
            $result->kind = CompanyUpdateUpdateKind::from($arr["kind"]);
        }
        if (array_key_exists("parents", $arr))
        {
            $result->parents = array();
            foreach($arr["parents"] as &$value)
            {
                array_push($result->parents, Company::hydrate($value));
            }
        }
        if (array_key_exists("replaceExistingParents", $arr))
        {
            $result->replaceExistingParents = $arr["replaceExistingParents"];
        }
        return $result;
    }
    function setCompany(Company $company)
    {
        $this->company = $company;
        return $this;
    }
    function setKind(CompanyUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    function setParents(Company ... $parents)
    {
        $this->parents = $parents;
        return $this;
    }
    /** @param ?Company[] $parents new value. */
    function setParentsFromArray(array $parents)
    {
        $this->parents = $parents;
        return $this;
    }
    function addToParents(Company $parents)
    {
        if (!isset($this->parents))
        {
            $this->parents = array();
        }
        array_push($this->parents, $parents);
        return $this;
    }
    function setReplaceExistingParents(bool $replaceExistingParents)
    {
        $this->replaceExistingParents = $replaceExistingParents;
        return $this;
    }
}
