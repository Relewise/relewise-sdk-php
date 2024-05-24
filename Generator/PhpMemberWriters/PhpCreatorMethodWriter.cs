using Generator.Extensions;
using System.CodeDom.Compiler;
using System.Globalization;
using System.Reflection;
using Relewise.Client.Requests;
using Relewise.Client.Requests.RelevanceModifiers;
using Relewise.Client.Requests.Conditions;
using Relewise.Client.Requests.ValueSelectors;

namespace Generator.PhpMemberWriters;

public class PhpCreatorMethodWriter
{
    private readonly Dictionary<Type, ConstructorInfo> overrideDefaultConstructors = new()
    {
        [typeof(Channel)] = typeof(Channel).GetConstructor(new[] { typeof(string) })!, // We override any matching logic and choose the constructor with one string parameter.
        [typeof(ProductDataRelevanceModifier)] = typeof(ProductDataRelevanceModifier).GetConstructor(new[] { typeof(string), typeof(List<ValueCondition>), typeof(ValueSelector), typeof(bool), typeof(bool) })!
    };

    private readonly PhpWriter phpWriter;

    public PhpCreatorMethodWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type type, string typeName,
        (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] settablePropertyInformations,
        (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] ownedPropertyInformations)
    {
        if (type.IsAbstract || type.IsInterface) return;

        var allConstructors = type // We only want to generate constructors that aren't obsoleted.
            .GetConstructors()
            .Where(c => !Attribute.IsDefined(c, typeof(ObsoleteAttribute)))
            .ToArray();

        var coveringUniqueTypeMappableConstructorParameters = allConstructors
            .FirstOrDefault(c => c.GetParameters().Length == c.GetParameters().DistinctBy(parameter => parameter.ParameterType).Count() // There are no parameters with the same type.
                                 && c.GetParameters().Length == ownedPropertyInformations.Length // There are as many parameters as there are properties.
                                 && c.GetParameters()
                                     .All(parameter => ownedPropertyInformations
                                         .Any(property => ParameterIsPersuadableIntoPropertyType(property.info, parameter))
                                     ) // There is a property type that matches each parameter type.
            )
            ?.GetParameters()
            .ToArray();

        var coveringTypeAndNameMappableConstructorParameters = allConstructors
            .Where(c => c.GetParameters()
                                     .All(parameter => ownedPropertyInformations
                                         .Count(property =>
                                             ContainedWithinEitherOne(property.propertyName, parameter.Name)
                                             && ParameterIsPersuadableIntoPropertyType(property.info, parameter)) == 1
                                     ) // There is exactly 1 property type that matches each parameter type and name
            )
            .MaxBy(c => c.GetParameters().Length) // We take the largest constructor to be more deterministic.
            ?.GetParameters()
            .ToArray();

        var allConstructorParametersIntersectionWithMappableNamesAndTypes = allConstructors
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

        if (overrideDefaultConstructors.TryGetValue(type, out ConstructorInfo? defaultConstructor))
        {
            var parameters = defaultConstructor.GetParameters();

            writer.WriteCommentBlock(
                parameters.Select(p => phpWriter.XmlDocumentation.GetConstructorParam(typeName, parameters, p))
                    .Prepend(phpWriter.XmlDocumentation.GetConstructorSummary(typeName, parameters))
                    .ToArray()
            );

            writer.WriteLine($"public static function create({ParameterList(parameters)}) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");

            foreach (var parameter in parameters)
            {
                // We use settablePropertyInformations here as the only place as it was an error originally that we didn't use it, but it would create too many breaking changes if we corrected in all places.
                var propertyName = settablePropertyInformations
                    .Single(property => ContainedWithinEitherOne(property.propertyName, parameter.Name) && ParameterIsPersuadableIntoPropertyType(property.info, parameter))
                    .lowerCaseName;

                writer.WriteLine($"$result->{propertyName} = ${parameter.Name};");
            }
        }
        else if (coveringUniqueTypeMappableConstructorParameters?.Length > 0)
        {
            writer.WriteCommentBlock(
                coveringUniqueTypeMappableConstructorParameters.Select(p => phpWriter.XmlDocumentation.GetConstructorParam(typeName, coveringUniqueTypeMappableConstructorParameters, p))
                    .Prepend(phpWriter.XmlDocumentation.GetConstructorSummary(typeName, coveringUniqueTypeMappableConstructorParameters))
                    .ToArray()
            );

            writer.WriteLine($"public static function create({ParameterList(coveringUniqueTypeMappableConstructorParameters)}) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");

            foreach (var parameter in coveringUniqueTypeMappableConstructorParameters)
            {
                var propertyName = ownedPropertyInformations
                    .Single(property => ParameterIsPersuadableIntoPropertyType(property.info, parameter))
                    .lowerCaseName;

                writer.WriteLine($"$result->{propertyName} = ${parameter.Name};");
            }
        }
        else if (coveringTypeAndNameMappableConstructorParameters?.Length > 0)
        {
            writer.WriteCommentBlock(
                coveringTypeAndNameMappableConstructorParameters.Select(p => phpWriter.XmlDocumentation.GetConstructorParam(typeName, coveringTypeAndNameMappableConstructorParameters, p))
                    .Prepend(phpWriter.XmlDocumentation.GetConstructorSummary(typeName, coveringTypeAndNameMappableConstructorParameters))
                    .ToArray()
            );

            writer.WriteLine($"public static function create({ParameterList(coveringTypeAndNameMappableConstructorParameters)}) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$result = new {typeName}();");

            foreach (var parameter in coveringTypeAndNameMappableConstructorParameters)
            {
                var propertyName = ownedPropertyInformations
                    .Single(property => ContainedWithinEitherOne(property.propertyName, parameter.Name) && ParameterIsPersuadableIntoPropertyType(property.info, parameter))
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

        IEnumerable<string?> coveredParameterNames;
        if (coveringUniqueTypeMappableConstructorParameters?.Length > 0)
        {
            coveredParameterNames = coveringUniqueTypeMappableConstructorParameters.Select(parameter => parameter.Name);
        }
        else if (coveringTypeAndNameMappableConstructorParameters?.Length > 0)
        {
            coveredParameterNames = coveringTypeAndNameMappableConstructorParameters.Select(parameter => parameter.Name);
        }
        else if (allConstructorParametersIntersectionWithMappableNamesAndTypes?.Length > 0)
        {
            coveredParameterNames = allConstructorParametersIntersectionWithMappableNamesAndTypes.Select(parameter => parameter.Name);
        }
        else
        {
            coveredParameterNames = Array.Empty<string>();
        }

        var extraDefaultSetParameters = allConstructors
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
        return EnumerableTypeArgumentMatchesArrayElementType(type1, type2)
            || EnumerableTypeArgumentMatchesArrayElementType(type2, type1)
            || EnumerableTypeArgumentMatchesSecondEnumerableType(type1, type2);
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

    private static bool EnumerableTypeArgumentMatchesArrayElementType(Type type1, Type type2)
    {
        return type1.IsGenericType
               && (type1.GetGenericTypeDefinition() == typeof(List<>) || type1.GetGenericTypeDefinition() == typeof(IEnumerable<>))
               && type2.IsArray
               && type1.GenericTypeArguments[0] == type2.GetElementType();
    }

    private static bool EnumerableTypeArgumentMatchesSecondEnumerableType(Type type1, Type type2)
    {
        return type1.IsGenericType
               && (type1.GetGenericTypeDefinition() == typeof(List<>) || type1.GetGenericTypeDefinition() == typeof(IEnumerable<>))
               && type2.IsGenericType
               && (type2.GetGenericTypeDefinition() == typeof(List<>) || type2.GetGenericTypeDefinition() == typeof(IEnumerable<>))
               && type1.GenericTypeArguments[0] == type2.GenericTypeArguments[0];
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