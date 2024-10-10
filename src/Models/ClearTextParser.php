<?php declare(strict_types=1);

namespace Relewise\Models;

class ClearTextParser extends Parser
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.Parsers.ClearTextParser, Relewise.Client";
    
    public static function create() : ClearTextParser
    {
        $result = new ClearTextParser();
        return $result;
    }
    
    public static function hydrate(array $arr) : ClearTextParser
    {
        $result = Parser::hydrateBase(new ClearTextParser(), $arr);
        return $result;
    }
}
