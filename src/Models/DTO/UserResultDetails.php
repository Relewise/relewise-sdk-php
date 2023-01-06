<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class UserResultDetails
{
    public string $authenticatedId;
    public string $temporaryId;
    public string $email;
    public array $classifications;
    public ?DateTime $lastCartUpdateUtc;
    public DateTime $lastActivityUtc;
    public ?DateTime $lastOrderUtc;
    public array $carts;
    public string $lastActiveCartName;
    public int $totalNumberOfOrders;
    public array $identifiers;
    public int $key;
    public array $data;
    public array $temporaryIds;
    public static function create() : UserResultDetails
    {
        $result = new UserResultDetails();
        return $result;
    }
    public static function hydrate(array $arr) : UserResultDetails
    {
        $result = new UserResultDetails();
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
        if (array_key_exists("lastCartUpdateUtc", $arr))
        {
            $result->lastCartUpdateUtc = $arr["lastCartUpdateUtc"];
        }
        if (array_key_exists("lastActivityUtc", $arr))
        {
            $result->lastActivityUtc = $arr["lastActivityUtc"];
        }
        if (array_key_exists("lastOrderUtc", $arr))
        {
            $result->lastOrderUtc = $arr["lastOrderUtc"];
        }
        if (array_key_exists("carts", $arr))
        {
            $result->carts = array();
            foreach($arr["carts"] as $key => $value)
            {
                $result->carts[$key] = CartDetails::hydrate($value);
            }
        }
        if (array_key_exists("lastActiveCartName", $arr))
        {
            $result->lastActiveCartName = $arr["lastActiveCartName"];
        }
        if (array_key_exists("totalNumberOfOrders", $arr))
        {
            $result->totalNumberOfOrders = $arr["totalNumberOfOrders"];
        }
        if (array_key_exists("identifiers", $arr))
        {
            $result->identifiers = array();
            foreach($arr["identifiers"] as $key => $value)
            {
                $result->identifiers[$key] = $value;
            }
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("temporaryIds", $arr))
        {
            $result->temporaryIds = array();
            foreach($arr["temporaryIds"] as &$value)
            {
                array_push($result->temporaryIds, $value);
            }
        }
        return $result;
    }
    function withAuthenticatedId(string $authenticatedId)
    {
        $this->authenticatedId = $authenticatedId;
        return $this;
    }
    function withTemporaryId(string $temporaryId)
    {
        $this->temporaryId = $temporaryId;
        return $this;
    }
    function withEmail(string $email)
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
    function withLastCartUpdateUtc(?DateTime $lastCartUpdateUtc)
    {
        $this->lastCartUpdateUtc = $lastCartUpdateUtc;
        return $this;
    }
    function withLastActivityUtc(DateTime $lastActivityUtc)
    {
        $this->lastActivityUtc = $lastActivityUtc;
        return $this;
    }
    function withLastOrderUtc(?DateTime $lastOrderUtc)
    {
        $this->lastOrderUtc = $lastOrderUtc;
        return $this;
    }
    function addCarts(string $key, CartDetails $value)
    {
        if (!isset($this->carts))
        {
            $this->carts = array();
        }
        $this->carts[$key] = $value;
        return $this;
    }
    function withLastActiveCartName(string $lastActiveCartName)
    {
        $this->lastActiveCartName = $lastActiveCartName;
        return $this;
    }
    function withTotalNumberOfOrders(int $totalNumberOfOrders)
    {
        $this->totalNumberOfOrders = $totalNumberOfOrders;
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
    function withKey(int $key)
    {
        $this->key = $key;
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
    function withTemporaryIds(string ... $temporaryIds)
    {
        $this->temporaryIds = $temporaryIds;
        return $this;
    }
}
