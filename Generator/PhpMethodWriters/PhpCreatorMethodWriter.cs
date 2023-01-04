using Generator.Extensions;
using System.CodeDom.Compiler;
using System.Globalization;

namespace Generator.PhpMethodWriters;

public class PhpCreatorMethodWriter
{
    private readonly PhpWriter phpWriter;

    public PhpCreatorMethodWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type type, string typeName, (Type type, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        if (type.IsAbstract || type.IsInterface) return;

        writer.WriteLine($"public static function create() : {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$result = new {typeName}();");

        var defaultValueParameterizedProperties = type.GetConstructors()
            .SelectMany(constructor => constructor.GetParameters())
            .Where(parameter => parameter.HasDefaultValue &&
                                type.GetProperties().Any(property => property.Name.ToCamelCase() == parameter.Name)
                                && parameter.DefaultValue is not null)
            .DistinctBy(parameter => parameter.Name);
        foreach (var parameter in defaultValueParameterizedProperties)
        {
            writer.WriteLine($"$result->{parameter.Name} = {LiteralValueExpression(parameter.DefaultValue!)};");
        }

        writer.WriteLine("return $result;");
        writer.Indent--;
        writer.WriteLine("}");
    }

    private string LiteralValueExpression(object obj)
    {
        return obj switch
        {
            int number => $"{number}",
            double number => $"{number.ToString(CultureInfo.InvariantCulture)}",
            float number => $"{number.ToString(CultureInfo.InvariantCulture)}",
            string stringLiteral => $"\"{stringLiteral}\"",
            _ when obj.GetType().IsEnum => $"{phpWriter.PhpTypeName(obj.GetType())}::{obj}",
            _ => System.Text.Json.JsonSerializer.Serialize(obj)
        };
    }
}