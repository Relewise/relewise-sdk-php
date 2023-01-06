<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackUserUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackUserUpdateRequest, Relewise.Client";
    public UserUpdate $userUpdate;
    public static function create(UserUpdate $userUpdate) : TrackUserUpdateRequest
    {
        $result = new TrackUserUpdateRequest();
        $result->userUpdate = $userUpdate;
        return $result;
    }
    public static function hydrate(array $arr) : TrackUserUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackUserUpdateRequest(), $arr);
        if (array_key_exists("userUpdate", $arr))
        {
            $result->userUpdate = UserUpdate::hydrate($arr["userUpdate"]);
        }
        return $result;
    }
    function withUserUpdate(UserUpdate $userUpdate)
    {
        $this->userUpdate = $userUpdate;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
