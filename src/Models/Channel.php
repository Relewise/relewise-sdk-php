<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Channel
{
    public string $typeDefinition = "Relewise.Client.Requests.Channel, Relewise.Client";
    public string $name;
    public ?Channel $subChannel;
    public static function create(string $name, Channel $subChannel) : Channel
    {
        $result = new Channel();
        $result->name = $name;
        $result->subChannel = $subChannel;
        return $result;
    }
    public static function hydrate(array $arr) : Channel
    {
        $result = new Channel();
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("subChannel", $arr))
        {
            $result->subChannel = Channel::hydrate($arr["subChannel"]);
        }
        return $result;
    }
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    function setSubChannel(?Channel $subChannel)
    {
        $this->subChannel = $subChannel;
        return $this;
    }
}
