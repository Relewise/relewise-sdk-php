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
        if (type.BaseType != typeof(object) && type.BaseType is { } extended && extended.IsAbstract || type.IsAbstract)
        {
            writer.WriteLine($"public string $typeDefinition = \"{type.FullName}, {type.Assembly.FullName!.Split(",")[0]}\";");
        }
        var settableProperties = type.GetProperties().Where(info => info.MemberType is MemberTypes.Property
                                                                    && info.GetIndexParameters().Length is 0
                                                                    && info.SetMethod is { IsAbstract: false }
                                                                    && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                                                                    && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                                                                    && (info.DeclaringType?.IsAbstract == type.IsAbstract)).ToArray();
        foreach (var propertyInfo in settableProperties)
        {
            WriteProperty(writer, propertyInfo);
        }

        var propertyInformations = settableProperties.Select(info => (type: info.PropertyType, propertyTypeName: phpWriter.PhpTypeName(info.PropertyType), propertyName: info.Name, lowerCaseName: $"{info.Name.ToCamelCase()}")).ToArray();

        phpWriter.PhpCreatorMethodWriter.Write(writer, type, typeName, propertyInformations);
        phpWriter.PhpHydrationMethodWriter.Write(writer, type, typeName, propertyInformations);

        foreach (var (propertyType, propertyTypeName, propertyName, lowerCaseName) in propertyInformations)
        {
            WritePropertySetter(writer, propertyType, propertyTypeName, propertyName, lowerCaseName);
        }
        writer.Indent--;
        writer.WriteLine("}");
    }

    private void WriteProperty(IndentedTextWriter writer, PropertyInfo propertyInfo)
    {
        writer.WriteLine($"public {phpWriter.PhpTypeName(propertyInfo.PropertyType)} ${propertyInfo.Name.ToCamelCase()};");
    }

    private void WritePropertySetter(IndentedTextWriter writer, Type propertyType, string propertyTypeName, string propertyName, string lowerCaseName)
    {
        if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>) && propertyType.GenericTypeArguments is [var keyType, var valueType])
        {
            writer.WriteLine($"function with{propertyName}({phpWriter.PhpTypeName(keyType)} $key, {phpWriter.PhpTypeName(valueType)} $value)");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"if (!isset($this->{lowerCaseName}))");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$this->{lowerCaseName} = array();");
            writer.Indent--;
            writer.WriteLine("}");
            writer.WriteLine($"$this->{lowerCaseName}[$key] = $value;");
            writer.WriteLine("return $this;");
            writer.Indent--;
            writer.WriteLine("}");
        }
        else
        {
            var parameterType = propertyTypeName is "array" ? propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>) && propertyType.GenericTypeArguments is [var elementType] ? phpWriter.PhpTypeName(elementType) + " ..." : propertyType.IsArray ? phpWriter.PhpTypeName(propertyType.GetElementType()!) + " ..." : "..." : propertyTypeName;
            writer.WriteLine($"function with{propertyName}({parameterType} ${lowerCaseName})");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$this->{lowerCaseName} = ${lowerCaseName};");
            writer.WriteLine("return $this;");
            writer.Indent--;
            writer.WriteLine("}");
        }
    }
}