using Generator.Extensions;
using Newtonsoft.Json;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpTypeWriters;

public class PhpClassWriter : IPhpTypeWriter
{
    private readonly PhpWriter phpWriter;

    public PhpClassWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public bool CanWrite(Type type) => type.IsClass;

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
        writer.WriteLine($"{(type.IsAbstract ? "abstract " : "")}class {typeName}{(type.BaseType != typeof(object) && type.BaseType is { } baseType ? $" extends {phpWriter.PhpTypeName(baseType).Replace("?", "")}" : "")}");
        writer.WriteLine("{");
        writer.Indent++;
        if (type.BaseType != typeof(object) && type.BaseType is { IsAbstract: true } || type.IsAbstract)
        {
            writer.WriteLine($"public string $typeDefinition = \"{type.FullName}, {type.Assembly.FullName!.Split(",")[0]}\";");
        }

        var settablePropertyInfo = type
            .GetProperties()
            .Where(info => info.MemberType is MemberTypes.Property
                           && info.GetIndexParameters().Length is 0
                           && info.SetMethod is { IsAbstract: false }
                           && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                           && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                           && info.Name != "Custom") // It is a special requirement that we should ignore the property Custom from all classes.
            .ToArray();

        var settableProperties = settablePropertyInfo
            .Select(info => (type: info.PropertyType, propertyTypeName: phpWriter.PhpTypeName(info), propertyName: info.Name, lowerCaseName: info.Name.ToCamelCase()))
            .ToArray();

        var ownedProperties = settablePropertyInfo
            .Where(info => info.DeclaringType == type 
                        && info.DeclaringType?.IsAbstract == type.IsAbstract)
            .Select(info => (type: info.PropertyType, propertyTypeName: phpWriter.PhpTypeName(info), propertyName: info.Name, lowerCaseName: info.Name.ToCamelCase()))
            .ToArray();

        foreach (var (_, propertyTypeName, _, lowerCaseName) in ownedProperties)
        {
            writer.WriteLine($"public {propertyTypeName} ${lowerCaseName};");
        }

        phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, ownedProperties);
        phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, ownedProperties);
        phpWriter.PhpPropertySetterMethodsWriter.Write(writer, settableProperties);

        writer.Indent--;
        writer.WriteLine("}");
    }
}