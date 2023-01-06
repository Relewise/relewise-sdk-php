<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class Parser
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.Parsers.Parser, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Configuration.Parsers.ClearTextParser, Relewise.Client")
        {
            return ClearTextParser::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Configuration.Parsers.HtmlParser, Relewise.Client")
        {
            return HtmlParser::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
