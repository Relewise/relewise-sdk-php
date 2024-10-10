<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setUserUpdate(UserUpdate $userUpdate)
    {
        $this->userUpdate = $userUpdate;
        return $this;
    }
}
