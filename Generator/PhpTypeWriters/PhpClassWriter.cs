using Generator.Extensions;
using Relewise.Client.DataTypes.Search.Facets.Result;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpTypeWriters;

public class PhpClassWriter : IPhpTypeWriter
{
    private static readonly Type[] ExtractableFacetResultTypes = { typeof(ProductFacetResult), typeof(ContentFacetResult), typeof(ProductCategoryFacetResult) };

    private static readonly Dictionary<string, string[]> TypesWithCustomUsings = new()
    {
        { "DateInterval",
            [
                "use DateInterval;",
                @"use Relewise\Factory\DateIntervalFactory;"
            ]
        }
    };
    private readonly PhpWriter phpWriter;

    public PhpClassWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public bool CanWrite(Type type) => IsClass(type) || IsAnyStruct(type);

    private bool IsClass(Type type) => type.IsClass;

    private bool IsReadonlyStruct(Type type) => type.IsValueType && type.GetProperties().All(p => !p.CanWrite);

    private bool IsAnyStruct(Type type) => type.IsValueType;

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        var gettablePropertyInfo = type.FindGettablePropertyInfos();

        var settablePropertyInfo = type.FindSettablePropertyInfos();

        var gettableProperties = gettablePropertyInfo
            .Select(MapPropertyInfo)
            .ToArray();
        var settableProperties = settablePropertyInfo
            .Select(MapPropertyInfo)
            .ToArray();

        var ownedProperties = type.FindOwnedPropertyInfos()
            .Select(MapPropertyInfo)
            .ToArray();
        var staticGetterProperties = gettablePropertyInfo
            .Where(info => info.GetAccessors(nonPublic: false).Any(x => x.IsStatic)
                           && info.SetMethod is null)
            .Select(MapPropertyInfo)
            .ToArray();

        writer.WriteLine("<?php declare(strict_types=1);");
        writer.WriteLine();
        writer.WriteLine($"namespace {Constants.Namespace};");
        writer.WriteLine();

        bool hasDateTimeOrDateTimeOffsetProperty = gettableProperties.Any(p => p.propertyTypeName is "DateTime" or "?DateTime");
        if (hasDateTimeOrDateTimeOffsetProperty)
        {
            writer.WriteLine("use DateTime;");
        }

        IEnumerable<string?> customUsings = gettableProperties
            .SelectMany(p => TypesWithCustomUsings.GetValueOrDefault(p.propertyTypeName) ?? [])
            .Distinct();

        foreach (string? customUsing in customUsings)
        {
            if (customUsing != null)
            {
                writer.WriteLine(customUsing);
            }
        }

        if (hasDateTimeOrDateTimeOffsetProperty)
        {
            writer.WriteLine("use JsonSerializable;");
            writer.WriteLine();
        }

        string? baseTypeName = null;
        if (type.BaseType != typeof(object) && type.BaseType != typeof(ValueType) && type.BaseType is { } baseType)
        {
            baseTypeName = phpWriter.PhpTypeName(baseType).Replace("?", "");
        }
        else if (ExtractableFacetResultTypes.Contains(type))
        {
            writer.WriteLine($"use Relewise\\FacetResultExtractable\\{type.Name}Extractable;");
            writer.WriteLine();
            baseTypeName = $"{type.Name}Extractable";
        }

        var deprecationComment = type.GetCustomAttribute(typeof(ObsoleteAttribute)) is ObsoleteAttribute { } obsolete ? $"@deprecated {obsolete.Message}" : null;

        writer.WriteCommentBlock(
            phpWriter.XmlDocumentation.GetSummary(type),
            deprecationComment
        );

        if (type.IsAbstract)
        {
            writer.Write("abstract ");
        }
        writer.Write($"class {typeName}");
        if (baseTypeName is not null)
        {
            writer.Write($" extends {baseTypeName}");
        }
        if (hasDateTimeOrDateTimeOffsetProperty)
        {
            writer.Write(" implements JsonSerializable");
        }
        writer.WriteLine();

        writer.WriteLine("{");
        writer.Indent++;

        if (type.HasBaseTypeAndIsNotAbstract())
        {
            writer.WriteLine($"public string $typeDefinition = \"{type.FullName}, {type.Assembly.FullName!.Split(",")[0]}\";");
        }
        else if (type.IsAbstract)
        {
            // This is here so that it can be overriden by a concrete implementation in the JSON serialization.
            writer.WriteLine($"public string $typeDefinition = \"\";");
        }

        if (IsReadonlyStruct(type))
        {
            phpWriter.PhpSettablePropertiesWriter.Write(writer, type, gettableProperties);
            phpWriter.PhpStaticReadonlyPropertiesWriter.Write(writer, staticGetterProperties);

            if (gettableProperties.Length + staticGetterProperties.Length > 0)
            {
                writer.WriteLine(); // We only add spacing here if there are any properties.
            }

            phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, gettableProperties, gettableProperties);
            phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, gettableProperties);
            phpWriter.PhpPropertySetterMethodsWriter.Write(writer, type, gettableProperties);

            if (hasDateTimeOrDateTimeOffsetProperty)
            {
                phpWriter.PhpJsonSerializerMethodWriter.Write(writer, type, gettableProperties);
            }
        }
        else if (IsClass(type) || IsAnyStruct(type))
        {
            phpWriter.PhpSettablePropertiesWriter.Write(writer, type, ownedProperties);
            phpWriter.PhpStaticReadonlyPropertiesWriter.Write(writer, staticGetterProperties);

            if (ownedProperties.Length + staticGetterProperties.Length > 0)
            {
                writer.WriteLine(); // We only add spacing here if there are any properties.
            }

            phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, settableProperties, ownedProperties);
            phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, ownedProperties);
            phpWriter.PhpPropertySetterMethodsWriter.Write(writer, type, settableProperties);

            if (hasDateTimeOrDateTimeOffsetProperty)
            {
                phpWriter.PhpJsonSerializerMethodWriter.Write(writer, type, settableProperties);
            }
        }

        writer.Indent--;
        writer.WriteLine("}");
    }

    private (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName) MapPropertyInfo(PropertyInfo info)
    {
        return (info, propertyTypeName: phpWriter.PhpTypeName(info), propertyName: info.Name, lowerCaseName: info.Name.ToCamelCase());
    }
}
