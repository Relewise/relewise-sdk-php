<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class User
{
    public string $typeDefinition = "Relewise.Client.DataTypes.User, Relewise.Client";
    public ?string $authenticatedId;
    public ?string $temporaryId;
    public ?string $email;
    public ?array $classifications;
    public ?array $identifiers;
    public ?array $data;
    public ?string $fingerprint;
    public ?Channel $channel;
    public static function create(?string $authenticatedId, ?string $temporaryId, ?string $email, ?string $fingerprint, ?array $classifications, ?array $identifiers, ?array $data) : User
    {
        $result = new User();
        $result->authenticatedId = $authenticatedId;
        $result->temporaryId = $temporaryId;
        $result->email = $email;
        $result->fingerprint = $fingerprint;
        $result->classifications = $classifications;
        $result->identifiers = $identifiers;
        $result->data = $data;
        return $result;
    }
    public static function hydrate(array $arr) : User
    {
        $result = new User();
        if (array_key_exists("authenticatedId", $arr))
        {
            $result->authenticatedId = $arr["authenticatedId"];
        }
        if (array_key_exists("temporaryId", $arr))
        {
            $result->temporaryId = $arr["temporaryId"];
        }
        if (array_key_exists("email", $arr))
        {
            $result->email = $arr["email"];
        }
        if (array_key_exists("classifications", $arr))
        {
            $result->classifications = array();
            foreach($arr["classifications"] as $key => $value)
            {
                $result->classifications[$key] = $value;
            }
        }
        if (array_key_exists("identifiers", $arr))
        {
            $result->identifiers = array();
            foreach($arr["identifiers"] as $key => $value)
            {
                $result->identifiers[$key] = $value;
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("fingerprint", $arr))
        {
            $result->fingerprint = $arr["fingerprint"];
        }
        if (array_key_exists("channel", $arr))
        {
            $result->channel = Channel::hydrate($arr["channel"]);
        }
        return $result;
    }
    function setAuthenticatedId(?string $authenticatedId)
    {
        $this->authenticatedId = $authenticatedId;
        return $this;
    }
    function setTemporaryId(?string $temporaryId)
    {
        $this->temporaryId = $temporaryId;
        return $this;
    }
    function setEmail(?string $email)
    {
        $this->email = $email;
        return $this;
    }
    function addToClassifications(string $key, string $value)
    {
        if (!isset($this->classifications))
        {
            $this->classifications = array();
        }
        $this->classifications[$key] = $value;
        return $this;
    }
    function setClassificationsFromAssociativeArray(array $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
    function addToIdentifiers(string $key, string $value)
    {
        if (!isset($this->identifiers))
        {
            $this->identifiers = array();
        }
        $this->identifiers[$key] = $value;
        return $this;
    }
    function setIdentifiersFromAssociativeArray(array $identifiers)
    {
        $this->identifiers = $identifiers;
        return $this;
    }
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    function setFingerprint(?string $fingerprint)
    {
        $this->fingerprint = $fingerprint;
        return $this;
    }
    function setChannel(?Channel $channel)
    {
        $this->channel = $channel;
        return $this;
    }
}
