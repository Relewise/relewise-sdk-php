using Generator.Extensions;
using Newtonsoft.Json;
using Relewise.Client.DataTypes.Search.Facets.Result;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpTypeWriters;

public class PhpClassWriter : IPhpTypeWriter
{
    private static readonly Type[] ExtractableFacetResultTypes = { typeof(ProductFacetResult), typeof(ContentFacetResult), typeof(ProductCategoryFacetResult) };
    private static readonly string[] IgnoredProperties = new[] { "Channel", "SubChannel", "TrackingNumber" };

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
        var gettablePropertyInfo = type
            .GetProperties()
            .Where(info => info.MemberType is MemberTypes.Property
                           && info.GetIndexParameters().Length is 0
                           && info.GetMethod is { IsAbstract: false }
                           && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                           && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                           && info.Name != "Custom" // It is a special requirement that we should ignore the property Custom from all classes.
                           && !(Attribute.IsDefined(info, typeof(ObsoleteAttribute)) && IgnoredProperties.Contains(info.Name)) // Certain properties should not be generated if they are obsolete as they might have been obsoleted before the PHP SDK was first released or because they were added and obsoleted in between releases of the PHP SDK.
            )
            .ToArray();
        var settablePropertyInfo = gettablePropertyInfo
            .Where(info => info.SetMethod is { IsAbstract: false })
            .ToArray();

        var gettableProperties = gettablePropertyInfo
            .Select(MapPropertyInfo)
            .ToArray();
        var settableProperties = settablePropertyInfo
            .Select(MapPropertyInfo)
            .ToArray();

        var ownedProperties = settablePropertyInfo
            .Where(info => info.DeclaringType == type
                           && info.DeclaringType?.IsAbstract == type.IsAbstract)
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

        if (IsClass(type))
        {
            phpWriter.PhpSettablePropertiesWriter.Write(writer, type, ownedProperties);
            phpWriter.PhpStaticReadonlyPropertiesWriter.Write(writer, staticGetterProperties);

            phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, settableProperties, ownedProperties);
            phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, ownedProperties);
            phpWriter.PhpPropertySetterMethodsWriter.Write(writer, type, settableProperties);

            if (hasDateTimeOrDateTimeOffsetProperty)
            {
                phpWriter.PhpJsonSerializerMethodWriter.Write(writer, type, settableProperties);
            }
        }
        else if (IsReadonlyStruct(type))
        {
            phpWriter.PhpSettablePropertiesWriter.Write(writer, type, gettableProperties);
            phpWriter.PhpStaticReadonlyPropertiesWriter.Write(writer, staticGetterProperties);

            phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, gettableProperties, gettableProperties);
            phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, gettableProperties);
            phpWriter.PhpPropertySetterMethodsWriter.Write(writer, type, gettableProperties);

            if (hasDateTimeOrDateTimeOffsetProperty)
            {
                phpWriter.PhpJsonSerializerMethodWriter.Write(writer, type, gettableProperties);
            }
        }
        else if (IsAnyStruct(type))
        {
            phpWriter.PhpSettablePropertiesWriter.Write(writer, type, ownedProperties);
            phpWriter.PhpStaticReadonlyPropertiesWriter.Write(writer, staticGetterProperties);

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