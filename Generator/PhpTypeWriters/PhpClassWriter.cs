using Generator.Extensions;
using Newtonsoft.Json;
using Relewise.Client.DataTypes.Search.Facets.Result;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpTypeWriters;

public class PhpClassWriter : IPhpTypeWriter
{
    private static readonly Type[] ExtractableFacetResultTypes = { typeof(ProductFacetResult), typeof(ContentFacetResult), typeof(ProductCategoryFacetResult) };

    private readonly PhpWriter phpWriter;

    public PhpClassWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public bool CanWrite(Type type) => type.IsClass;

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace {Constants.Namespace};

use DateTime;

""");
        string? baseTypeName = null;
        if (type.BaseType != typeof(object) && type.BaseType is { } baseType)
        {
            baseTypeName = phpWriter.PhpTypeName(baseType).Replace("?", "");
        }
        else if (ExtractableFacetResultTypes.Contains(type))
        {
            writer.WriteLine($"use Relewise\\FacetResultExtractable\\{type.Name}Extractable;");
            writer.WriteLine();
            baseTypeName = $"{type.Name}Extractable";
        }

        if (phpWriter.XmlDocumentation.TryGetSummary(type, out string summary))
        {
            writer.WriteLine(summary);
        }
        writer.WriteLine($"{(type.IsAbstract ? "abstract " : "")}class {typeName}{(baseTypeName is not null ? $" extends {baseTypeName}" : "")}");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"public string $typeDefinition = \"{type.FullName}, {type.Assembly.FullName!.Split(",")[0]}\";");

        var gettablePropertyInfo = type
            .GetProperties()
            .Where(info => info.MemberType is MemberTypes.Property
                           && info.GetIndexParameters().Length is 0
                           && info.GetMethod is { IsAbstract: false }
                           && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                           && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                           && info.Name != "Custom") // It is a special requirement that we should ignore the property Custom from all classes.
            .ToArray();
        var settablePropertyInfo = gettablePropertyInfo
            .Where(info => info.SetMethod is { IsAbstract: false })
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

        phpWriter.PhpSettablePropertiesWriter.Write(writer, type, ownedProperties);
        phpWriter.PhpStaticReadonlyPropertiesWriter.Write(writer, staticGetterProperties);

        phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, ownedProperties);
        phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, ownedProperties);
        phpWriter.PhpPropertySetterMethodsWriter.Write(writer, settableProperties);

        writer.Indent--;
        writer.WriteLine("}");
    }

    private (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName) MapPropertyInfo(PropertyInfo info)
    {
        return (info, propertyTypeName: phpWriter.PhpTypeName(info), propertyName: info.Name, lowerCaseName: info.Name.ToCamelCase());
    }
}