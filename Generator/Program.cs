using System.CodeDom.Compiler;
using System.IO;
using System.Reflection;
using MessagePack;
using Relewise.Client.Requests;
using Relewise.Client.Responses;
using Relewise.Client.Responses.Search;

HashSet<Type> TypeDefintions = new();
HashSet<string> GeneratedTypeNames = new();
HashSet<Type> MissingTypeDefintions = new();

using var streamWriter = File.CreateText("../../../../src/Models/models.php");
using var writer = new IndentedTextWriter(streamWriter);

writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");

var typesToGenerate = new Queue<Type>();

foreach (var requestType in Assembly
             .GetAssembly(typeof(LicensedRequest))
             .GetTypes()
             .Where(type => type.IsSubclassOf(typeof(LicensedRequest))))
{
    AddTypeDefinition(requestType);
}

foreach (var responseType in Assembly
             .GetAssembly(typeof(TimedResponse))
             .GetTypes()
             .Where(type => type.IsSubclassOf(typeof(TimedResponse))))
{
    AddTypeDefinition(responseType);
}

while (typesToGenerate.Count > 0)
{
    var type = typesToGenerate.Dequeue();
    if (type.IsClass)
    {
        if (type.IsAbstract && type.IsGenericType && type.GenericTypeArguments.Length == 0)
        {
            continue;
        }
        WriteClass(writer, type);
    }
    else if (type.IsEnum)
    {
        WriteEnum(writer, type);
    }
    else if (type.IsInterface)
    {
        WriteInterface(writer, type);
    }
    else
    {
        MissingTypeDefintions.Add(type);
    }
    writer.WriteLine();
}


if (MissingTypeDefintions.Count > 0)
{
    writer.WriteLine("// We are missing these still");
    writer.Indent++;
    foreach (var typeDefinition in MissingTypeDefintions)
    {
        writer.WriteLine($"// {typeDefinition.Name}");
    }
    writer.Indent--;
}


void WriteClass(IndentedTextWriter writer, Type type)
{
    if (!GeneratedTypeNames.Add(PhpType(type))) return;
    writer.WriteLine($"{(type.IsAbstract ? "abstract " : "")}class {PhpType(type)}{(type.BaseType != typeof(object) && type.BaseType is { } baseType ? $" extends {PhpType(baseType)}" : "")}");
    writer.WriteLine("{");
    writer.Indent++;
    foreach (var propertyInfo in type.GetProperties().Where(info => info.MemberType is MemberTypes.Property
                                                                    && info.SetMethod is not null
                                                                    && !info.GetSetMethod().IsAbstract
                                                                    && !Attribute.IsDefined(info, typeof(IgnoreMemberAttribute))
                                                                    && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                                                                    && (info.DeclaringType.IsAbstract == type.IsAbstract)))
    {
        writer.WriteLine($"public {PhpType(propertyInfo.PropertyType)} ${propertyInfo.Name};");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteEnum(IndentedTextWriter writer, Type type)
{
    if (!GeneratedTypeNames.Add(type.Name.Replace("`1", ""))) return;
    writer.WriteLine($"enum {type.Name.Replace("`1", "")}");
    writer.WriteLine("{");
    writer.Indent++;
    foreach (var enumName in type.GetMembers().Where(propertyInfo => propertyInfo.DeclaringType.IsEnum && propertyInfo.Name is not "__value" and not "value__"))
    {
        writer.WriteLine($"case {enumName.Name};");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteInterface(IndentedTextWriter writer, Type type)
{
    if (!GeneratedTypeNames.Add(type.Name.Replace("`1", ""))) return;
    writer.WriteLine($"interface {type.Name.Replace("`1", "")}");
    writer.WriteLine("{");
    writer.WriteLine("}");
}

string PhpType(Type type)
{
    return type.Name switch
    {
        "String" => "string",
        "Int32" => "int",
        "Int64" => "int",
        "float" => "float",
        "Double" => "float",
        "Boolean" => "bool",
        "Guid" => "string",
        "Byte" => "int",
        "DateTimeOffset" => "DateTime",
        var value when value.StartsWith("Nullable") => $"?{PhpType(type.GenericTypeArguments.First())}",
        var value when value.StartsWith("List") => "array",
        var value when value.StartsWith("Dictionary") => "array",
        var value when value.EndsWith("[]") => "array",
        _ when type.IsGenericType => AddGenericTypeDefinition(type),
        _ => AddTypeDefinition(type)
    };
}

string AddTypeDefinition(Type type)
{
    if (TypeDefintions.Add(type))
    {
        typesToGenerate.Enqueue(type);
    }
    return type.Name.Replace("`1", "");
}

string AddGenericTypeDefinition(Type type)
{
    if (type.GenericTypeArguments.Length > 0)
    {
        return $"{PhpType(type.GenericTypeArguments.Single())}{AddTypeDefinition(type)}";
    }
    var genericTypeArgumentDefinition = type.GetGenericArguments().Single();
    var genericTypeArgumentConstraint = genericTypeArgumentDefinition.GetGenericParameterConstraints().Single();
    if (genericTypeArgumentConstraint.IsAbstract)
    {
        AddTypeDefinition(genericTypeArgumentConstraint);
        var derivedTypes = Assembly
            .GetAssembly(genericTypeArgumentConstraint)
            .GetTypes()
            .Where(derivingType => derivingType.IsAssignableFrom(genericTypeArgumentConstraint));
        foreach (var derivedType in derivedTypes.Skip(1))
        {
            AddTypeDefinition(derivedType);
        }
        return $"{PhpType(derivedTypes.First())}{AddTypeDefinition(type)}";
    }

    return AddTypeDefinition(type);
}