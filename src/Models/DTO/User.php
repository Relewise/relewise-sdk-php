<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class User
{
    public ?string $authenticatedId;
    public ?string $temporaryId;
    public ?string $email;
    public ?array $classifications;
    public ?array $identifiers;
    public ?array $data;
    public ?string $fingerprint;
    public static function create(?string $authenticatedId, ?string $temporaryId, ?string $email, ?string $fingerprint, ?array $classifications, ?array $identifiers, ... $data) : User
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
    function addClassifications(string $key, string $value)
    {
        if (!isset($this->classifications))
        {
            $this->classifications = array();
        }
        $this->classifications[$key] = $value;
        return $this;
    }
    function addIdentifiers(string $key, string $value)
    {
        if (!isset($this->identifiers))
        {
            $this->identifiers = array();
        }
        $this->identifiers[$key] = $value;
        return $this;
    }
    function addData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    function setFingerprint(?string $fingerprint)
    {
        $this->fingerprint = $fingerprint;
        return $this;
    }
}
