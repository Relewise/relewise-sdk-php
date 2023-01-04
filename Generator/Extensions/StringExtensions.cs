namespace Generator.Extensions;

public static class StringExtensions
{
    public static string ToCamelCase(this string value) => char.ToLower(value[0]) + value[1..];
}