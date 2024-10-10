<?php declare(strict_types=1);

namespace Relewise\Models;

class HtmlParser extends Parser
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.Parsers.HtmlParser, Relewise.Client";
    public static function create() : HtmlParser
    {
        $result = new HtmlParser();
        return $result;
    }
    
    public static function hydrate(array $arr) : HtmlParser
    {
        $result = Parser::hydrateBase(new HtmlParser(), $arr);
        return $result;
    }
}
