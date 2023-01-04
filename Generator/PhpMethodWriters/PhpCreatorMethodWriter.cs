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

        var directlyMappableConstructor = type
            .GetConstructors() // All 
            .FirstOrDefault(c => c.GetParameters()
                                    .Count(parameter => !parameter.HasDefaultValue)
                                 == c.GetParameters()
                                    .Where(parameter => !parameter.HasDefaultValue)
                                    .DistinctBy(parameter => parameter.ParameterType)
                                    .Count() // There are no parameters with the same type.
                              && c.GetParameters()
                                    .Count(parameter => !parameter.HasDefaultValue)
                                 == propertyInformations.Length // There are as many parameters as there are properties.
                              && c.GetParameters()
                                    .Where(parameter => !parameter.HasDefaultValue)
                                    .All(parameter => propertyInformations.
                                        Any(property => property.type == parameter.ParameterType
                                                        || EqualCollectionElementType(property.type, parameter.ParameterType)
                                        )
                                    ) // There is a property type that matches each parameter type.
            );

        if (directlyMappableConstructor is not null)
        {
            writer.WriteLine($"public static function create({string.Join(", ", directlyMappableConstructor.GetParameters().Select(parameter => $"{phpWriter.BetterTypedParameterTypeName(phpWriter.PhpTypeName(parameter.ParameterType), parameter.ParameterType)} ${parameter.Name}"))}) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");

            foreach (var parameter in directlyMappableConstructor.GetParameters().Where(parameter => !parameter.HasDefaultValue))
            {
                var propertyName = propertyInformations
                    .Single(property => property.type == parameter.ParameterType || EqualCollectionElementType(property.type, parameter.ParameterType))
                    .lowerCaseName;

                writer.WriteLine($"$result->{propertyName} = ${parameter.Name};");
            }
        }
        else
        {
            writer.WriteLine($"public static function create() : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");
        }

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

    private static bool EqualCollectionElementType(Type type1, Type type2)
    {
        return ListTypeArgumentMatchesArrayElementType(type1, type2)
            || ListTypeArgumentMatchesArrayElementType(type2, type1);
    }

    private static bool ListTypeArgumentMatchesArrayElementType(Type type1, Type type2)
    {
        return type1.IsGenericType
               && type1.GetGenericTypeDefinition() == typeof(List<>)
               && type2.IsArray
               && type1.GenericTypeArguments[0] == type2.GetElementType();
    }
}