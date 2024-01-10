<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserResultDetails, Relewise.Client";
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
    /** All known temporary ids for the user */
    public array $temporaryIds;
    public ?Channel $channel;
    public ?UserAssociatedCompanyResultDetails $company;
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
            $result->lastCartUpdateUtc = new DateTime($arr["lastCartUpdateUtc"]);
        }
        if (array_key_exists("lastActivityUtc", $arr))
        {
            $result->lastActivityUtc = new DateTime($arr["lastActivityUtc"]);
        }
        if (array_key_exists("lastOrderUtc", $arr))
        {
            $result->lastOrderUtc = new DateTime($arr["lastOrderUtc"]);
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
        if (array_key_exists("channel", $arr))
        {
            $result->channel = Channel::hydrate($arr["channel"]);
        }
        if (array_key_exists("company", $arr))
        {
            $result->company = UserAssociatedCompanyResultDetails::hydrate($arr["company"]);
        }
        return $result;
    }
    function setAuthenticatedId(string $authenticatedId)
    {
        $this->authenticatedId = $authenticatedId;
        return $this;
    }
    function setTemporaryId(string $temporaryId)
    {
        $this->temporaryId = $temporaryId;
        return $this;
    }
    function setEmail(string $email)
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
    /** @param array<string, string> $classifications associative array. */
    function setClassificationsFromAssociativeArray(array $classifications)
    {
        $this->classifications = $classifications;
        return $this;
    }
    function setLastCartUpdateUtc(?DateTime $lastCartUpdateUtc)
    {
        $this->lastCartUpdateUtc = $lastCartUpdateUtc;
        return $this;
    }
    function setLastActivityUtc(DateTime $lastActivityUtc)
    {
        $this->lastActivityUtc = $lastActivityUtc;
        return $this;
    }
    function setLastOrderUtc(?DateTime $lastOrderUtc)
    {
        $this->lastOrderUtc = $lastOrderUtc;
        return $this;
    }
    function addToCarts(string $key, CartDetails $value)
    {
        if (!isset($this->carts))
        {
            $this->carts = array();
        }
        $this->carts[$key] = $value;
        return $this;
    }
    /** @param array<string, CartDetails> $carts associative array. */
    function setCartsFromAssociativeArray(array $carts)
    {
        $this->carts = $carts;
        return $this;
    }
    function setLastActiveCartName(string $lastActiveCartName)
    {
        $this->lastActiveCartName = $lastActiveCartName;
        return $this;
    }
    function setTotalNumberOfOrders(int $totalNumberOfOrders)
    {
        $this->totalNumberOfOrders = $totalNumberOfOrders;
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
    /** @param array<string, string> $identifiers associative array. */
    function setIdentifiersFromAssociativeArray(array $identifiers)
    {
        $this->identifiers = $identifiers;
        return $this;
    }
    function setKey(int $key)
    {
        $this->key = $key;
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
    /** @param array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    /** All known temporary ids for the user */
    function setTemporaryIds(string ... $temporaryIds)
    {
        $this->temporaryIds = $temporaryIds;
        return $this;
    }
    /**
     * All known temporary ids for the user
     * @param string[] $temporaryIds new value.
     */
    function setTemporaryIdsFromArray(array $temporaryIds)
    {
        $this->temporaryIds = $temporaryIds;
        return $this;
    }
    /** All known temporary ids for the user */
    function addToTemporaryIds(string $temporaryIds)
    {
        if (!isset($this->temporaryIds))
        {
            $this->temporaryIds = array();
        }
        array_push($this->temporaryIds, $temporaryIds);
        return $this;
    }
    function setChannel(?Channel $channel)
    {
        $this->channel = $channel;
        return $this;
    }
    function setCompany(?UserAssociatedCompanyResultDetails $company)
    {
        $this->company = $company;
        return $this;
    }
}
