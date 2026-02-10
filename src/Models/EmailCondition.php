<?php declare(strict_types=1);

namespace Relewise\Models;

class EmailCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.EmailCondition, Relewise.Client";
    public array $emails;
    
    public static function create(array $emails, bool $negated = false) : EmailCondition
    {
        $result = new EmailCondition();
        $result->emails = $emails;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : EmailCondition
    {
        $result = UserCondition::hydrateBase(new EmailCondition(), $arr);
        if (array_key_exists("emails", $arr))
        {
            $result->emails = array();
            foreach($arr["emails"] as &$value)
            {
                array_push($result->emails, $value);
            }
        }
        return $result;
    }
    
    function setEmails(string ... $emails)
    {
        $this->emails = $emails;
        return $this;
    }
    
    /** @param string[] $emails new value. */
    function setEmailsFromArray(array $emails)
    {
        $this->emails = $emails;
        return $this;
    }
    
    function addToEmails(string $emails)
    {
        if (!isset($this->emails))
        {
            $this->emails = array();
        }
        array_push($this->emails, $emails);
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
