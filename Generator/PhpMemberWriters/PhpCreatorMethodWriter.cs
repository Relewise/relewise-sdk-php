﻿using Generator.Extensions;
using System.CodeDom.Compiler;
using System.Globalization;
using System.Reflection;

namespace Generator.PhpMemberWriters;

public class PhpCreatorMethodWriter
{
    private readonly PhpWriter phpWriter;

    public PhpCreatorMethodWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type type, string typeName, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        if (type.IsAbstract || type.IsInterface) return;

        var coveringTypeMappableConstructorParameters = type
            .GetConstructors() // All 
            .FirstOrDefault(c => c.GetParameters().Length == c.GetParameters().DistinctBy(parameter => parameter.ParameterType).Count() // There are no parameters with the same type.
                                 && c.GetParameters().Length == propertyInformations.Length // There are as many parameters as there are properties.
                                 && c.GetParameters()
                                     .All(parameter => propertyInformations
                                         .Any(property => ParameterIsPersuadableIntoPropertyType(property.info, parameter))
                                     ) // There is a property type that matches each parameter type.
            )
            ?.GetParameters()
            .ToArray();

        var allConstructorParametersIntersectionWithMappableNamesAndTypes = type
            .GetConstructors()
            .Where(c => c.GetParameters().Length > 0)
            .MinBy(c => c.GetParameters().Length)
            ?.GetParameters()
            .Where(parameter => type
                .GetConstructors()
                .Where(c => c.GetParameters().Length > 0)
                .All(c => c.GetParameters().Any(cParameter => 
                    cParameter.Name == parameter.Name
                    && cParameter.ParameterType == parameter.ParameterType))
                && type.GetProperties().Any(property =>
                    ContainedWithinEitherOne(property.Name, parameter.Name)
                    && ParameterIsPersuadableIntoPropertyType(property, parameter))
            )
            .ToArray();
        
        if (coveringTypeMappableConstructorParameters?.Length > 0)
        {
            writer.WriteLine($"public static function create({ParameterList(coveringTypeMappableConstructorParameters)}) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");

            foreach (var parameter in coveringTypeMappableConstructorParameters)
            {
                var propertyName = propertyInformations
                    .Single(property => ParameterIsPersuadableIntoPropertyType(property.info, parameter))
                    .lowerCaseName;

                writer.WriteLine($"$result->{propertyName} = ${parameter.Name};");
            }
        }
        else if (allConstructorParametersIntersectionWithMappableNamesAndTypes?.Length > 0)
        {
            writer.WriteLine($"public static function create({ParameterList(allConstructorParametersIntersectionWithMappableNamesAndTypes)}) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");

            foreach (var parameter in allConstructorParametersIntersectionWithMappableNamesAndTypes)
            {
                var matchingProperties = type.GetProperties()
                    .Where(property => ContainedWithinEitherOne(property.Name, parameter.Name)
                                       && ParameterIsPersuadableIntoPropertyType(property, parameter))
                    .ToArray();
                
                var propertyName = matchingProperties
                    .FirstOrDefault(property => property.Name.Equals(parameter.Name, StringComparison.OrdinalIgnoreCase)) is { } perfectMatch
                    ? perfectMatch.Name.ToCamelCase()
                    : matchingProperties.First().Name.ToCamelCase();

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

        var coveredParameterNames = coveringTypeMappableConstructorParameters?.Length > 0
            ? coveringTypeMappableConstructorParameters.Select(parameter => parameter.Name)
            : allConstructorParametersIntersectionWithMappableNamesAndTypes?.Length > 0
                ? allConstructorParametersIntersectionWithMappableNamesAndTypes.Select(parameter => parameter.Name)
                : new List<string>();

        var extraDefaultSetParameters = type.GetConstructors()
            .SelectMany(constructor => constructor.GetParameters())
            .Where(parameter => !coveredParameterNames.Contains(parameter.Name)
                                && parameter.DefaultValue is { } defaultValue && (defaultValue.GetType().IsValueType)
                                && type.GetProperties().Any(property =>
                                    property.Name.ToCamelCase() == parameter.Name
                                    && (
                                        property.PropertyType == parameter.ParameterType
                                        || EqualCollectionElementType(property.PropertyType, parameter.ParameterType)
                                    )
                                )
            )
            .DistinctBy(parameter => parameter.Name)
            .ToArray();

        foreach (var parameter in extraDefaultSetParameters)
        {
            var propertyName = type
                .GetProperties()
                .Single(property =>
                    property.Name.ToCamelCase() == parameter.Name
                    && (
                        property.PropertyType == parameter.ParameterType
                        || EqualCollectionElementType(property.PropertyType, parameter.ParameterType)
                    )
            ).Name.ToCamelCase();

            writer.WriteLine($"$result->{propertyName}{DefaultValueSetter(parameter)};");
        }


        writer.WriteLine("return $result;");
        writer.Indent--;
        writer.WriteLine("}");
    }

    private string DefaultValueSetter(ParameterInfo parameter)
    {
        return parameter.HasDefaultValue && parameter.DefaultValue is null ? " = Null" : parameter.DefaultValue is { } defaultValue && (defaultValue.GetType().IsValueType || defaultValue is string) ? $" = {LiteralValueExpression(defaultValue)}" : "";
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

    private string ParameterList(ParameterInfo[] parameters)
    {
        return string.Join(", ",
            parameters.Select(parameter =>
                $"{(parameters[^1] == parameter ? phpWriter.BetterTypedParameterTypeName(phpWriter.PhpTypeName(parameter), parameter.ParameterType) : phpWriter.PhpTypeName(parameter))} ${parameter.Name}{DefaultValueSetter(parameter)}"
            )
        );
    }

    private static bool EqualCollectionElementType(Type type1, Type type2)
    {
        return ListTypeArgumentMatchesArrayElementType(type1, type2)
            || ListTypeArgumentMatchesArrayElementType(type2, type1);
    }

    private static bool ParameterIsPersuadableIntoPropertyType(PropertyInfo property, ParameterInfo parameter)
    {
        if (EqualCollectionElementType(property.PropertyType, parameter.ParameterType))
        {
            return true;
        }

        if (property.PropertyType != parameter.ParameterType)
        {
            return false;
        }
        
        var propertyNullabilityContext = new NullabilityInfoContext().Create(property);
        var parameterNullabilityContext = new NullabilityInfoContext().Create(parameter);

        if (propertyNullabilityContext.WriteState is NullabilityState.Nullable)
        {
            return true;
        }

        if (propertyNullabilityContext.WriteState is NullabilityState.Nullable
            == parameterNullabilityContext.WriteState is NullabilityState.Nullable)
        {
            return true;
        }

        return false;
    }

    private static bool ListTypeArgumentMatchesArrayElementType(Type type1, Type type2)
    {
        return type1.IsGenericType
               && type1.GetGenericTypeDefinition() == typeof(List<>)
               && type2.IsArray
               && type1.GenericTypeArguments[0] == type2.GetElementType();
    }

    private static bool ContainedWithinEitherOne(string? first, string? second)
    {
        if (first is null || second is null)
        {
            return false;
        }

        return first.Contains(second, StringComparison.OrdinalIgnoreCase)
            || second.Contains(first, StringComparison.OrdinalIgnoreCase);
    }
}