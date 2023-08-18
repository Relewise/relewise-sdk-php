<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class User
{
    public string $typeDefinition = "Relewise.Client.DataTypes.User, Relewise.Client";
    /** A persistent Id for current user, e.g. a database-id            This Id should never be expected to change in the future */
    public ?string $authenticatedId;
    /** A TemporaryId, likely to change in the future, e.g. a CookieId in a web context */
    public ?string $temporaryId;
    /** The email of the user */
    public ?string $email;
    /** Segmentation data about the user, e.g. Country or other segmentation, useful for passing known information about the user from a CRM, CDP and other sources */
    public ?array $classifications;
    /** A set of additional ids associated with the user, e.g. ERP customer id, Marketing id, CDP id etc. */
    public ?array $identifiers;
    /** Data stored on the user */
    public ?array $data;
    /** A fingerprint, highly likely to change in the future, e.g. between a users sessions */
    public ?string $fingerprint;
    /**
     * User DTO
     * @param ?string $authenticatedId A persistent Id for current user, e.g. a database-id
     * @param ?string $temporaryId A TemporaryId, likely to change in the future, e.g. a CookieId in a web context
     * @param ?string $email The email of the user
     * @param ?string $fingerprint A fingerprint, highly likely to change in the future, e.g. between a users sessions
     * @param ?array<string, string> $classifications Segmentation data about the user, e.g. Country or other segmentation, useful for passing known information about the user from a CRM, CDP and other sources
     * @param ?array<string, string> $identifiers A set of additional ids associated with the user, e.g. ERP customer id, Marketing id, CDP id etc.
     * @param ?array<string, DataValue> $data Data stored on the user
     */
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
    /**
     * Sets classifications to a new value.
     * @param ?array<string, string> $classifications associative array.
     */
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
    /**
     * Sets identifiers to a new value.
     * @param ?array<string, string> $identifiers associative array.
     */
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
    /**
     * Sets data to a new value.
     * @param ?array<string, DataValue> $data associative array.
     */
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
}
