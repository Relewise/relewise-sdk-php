﻿using MessagePack;
using Newtonsoft.Json;
using Relewise.Client;
using Relewise.Client.Requests;
using Relewise.Client.Requests.Search;
using Relewise.Client.Requests.Tracking;
using Relewise.Client.Responses;
using Relewise.Client.Search;
using System.CodeDom.Compiler;
using System.Linq;
using System.Reflection;

if (args.Length is not 1)
{
    throw new ArgumentException("There needs to be parsed exactly one parameter to this program which is the path to where the class files should be generated.");
}

string basePath = args[0];
if (basePath.EndsWith("/"))
{
    basePath = basePath[..^1];
}

var assembly = Assembly.GetAssembly(typeof(Relewise.Client.ClientBase));
if (assembly is null)
{
    throw new ArgumentException("Could not load Relewise Client assembly.");
}

HashSet<Type> TypeDefintions = new();
HashSet<string> GeneratedTypeNames = new();
HashSet<Type> MissingTypeDefintions = new();

var typesToGenerate = new Queue<Type>();

foreach (var requestType in assembly
             .GetTypes()
             .Where(type => type.IsSubclassOf(typeof(LicensedRequest))))
{
    AddTypeDefinition(requestType);
}

foreach (var responseType in assembly
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
        WriteClass(type);
    }
    else if (type.IsEnum)
    {
        WriteEnum(type);
    }
    else if (type.IsInterface)
    {
        WriteInterface(type);
    }
    else
    {
        MissingTypeDefintions.Add(type);
    }
}

if (MissingTypeDefintions.Count > 0)
{
    Console.WriteLine("We are missing these types from generation as they were not supported with the current implementation.");
    foreach (var typeDefinition in MissingTypeDefintions)
    {
        Console.WriteLine($"- {typeDefinition.Name}");
    }
}

GenerateClientClass(typeof(TrackingRequest), typeof(Tracker));
GenerateClientClass(typeof(SearchRequest), typeof(Searcher));

#region Helper methods

void WriteClass(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName)) return;
    using var streamWriter = File.CreateText($"{basePath}/Models/DTO/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"{(type.IsAbstract ? "abstract " : "")}class {PhpType(type)}{(type.BaseType != typeof(object) && type.BaseType is { } baseType ? $" extends {PhpType(baseType)}" : "")}");
    writer.WriteLine("{");
    writer.Indent++;
    if (type.BaseType != typeof(object) && type.BaseType is { } extended && extended.IsAbstract)
    {
        writer.WriteLine($"public string $type = \"{type.FullName}, Relewise.Client\";");
    }
    var settableProperties = type.GetProperties().Where(info => info.MemberType is MemberTypes.Property
                                                                && info.GetIndexParameters().Length is 0
                                                                && info.SetMethod is { IsAbstract: false }
                                                                && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                                                                && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                                                                && (info.DeclaringType?.IsAbstract == type.IsAbstract)).ToArray();
    foreach (var propertyInfo in settableProperties)
    {
        writer.WriteLine($"public {PhpType(propertyInfo.PropertyType)} ${propertyInfo.Name};");
    }

    var parameterInformation = settableProperties.Select(info => (type: info.PropertyType, propertyTypeName: PhpType(info.PropertyType), propertyName: info.Name, lowerCaseName: $"{Char.ToLower(info.Name[0])}{info.Name[1..]}")).ToArray();

    if (!type.IsAbstract)
    {
        writer.WriteLine($"public static function create() : {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"return new {typeName}();");
        writer.Indent--;
        writer.WriteLine("}");

        writer.WriteLine($"public static function hydrate(array $arr) : {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$result = new {typeName}();");
        foreach (var (propertyType, propertyTypeName, propertyName, lowerCaseName) in parameterInformation)
        {
            WriteHydrationSetter(writer, propertyType, propertyName, lowerCaseName);
        }
        writer.WriteLine($"return $result;");
        writer.Indent--;
        writer.WriteLine("}");
    }

    foreach (var (_, propertyTypeName, propertyName, lowerCaseName) in parameterInformation)
    {
        writer.WriteLine($"function with{propertyName}({propertyTypeName} ${lowerCaseName})");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$this->{propertyName} = ${lowerCaseName};");
        writer.WriteLine($"return $this;");
        writer.Indent--;
        writer.WriteLine("}");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteEnum(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName)) return;
    using var streamWriter = File.CreateText($"{basePath}/Models/DTO/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"enum {type.Name.Replace("`1", "")} : string");
    writer.WriteLine("{");
    writer.Indent++;
    foreach (var enumMember in type.GetMembers().Where(propertyInfo => propertyInfo.DeclaringType is { IsEnum: true } && propertyInfo.Name is not "__value" and not "value__"))
    {
        writer.WriteLine($"case {enumMember.Name} = '{enumMember.Name}';");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteInterface(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName)) return;
    using var streamWriter = File.CreateText($"{basePath}/Models/DTO/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"interface {type.Name.Replace("`1", "")}");
    writer.WriteLine("{");
    writer.WriteLine("}");
}

void WriteHydrationSetter(IndentedTextWriter writer, Type propertyType, string propertyName, string lowerCaseName)
{
    writer.WriteLine($"if (array_key_exists(\"{lowerCaseName}\", $arr))");
    writer.WriteLine("{");
    writer.Indent++;
    if (propertyType.IsArray && propertyType.GetElementType() is { } elementType)
    {
        writer.WriteLine($"$result->{propertyName} = array();");
        writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as &$value)");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"array_push($result->{propertyName}, {HydrationExpression(elementType, "$value")});");
        writer.Indent--;
        writer.WriteLine("}");
    }
    else
    {
        writer.WriteLine($"$result->{propertyName} = {HydrationExpression(propertyType, $"$arr[\"{lowerCaseName}\"]")};");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

string HydrationExpression(Type type, string jsonValue)
{
    if (type.IsEnum)
    {
        return $"{PhpType(type)}::from({jsonValue})";
    }
    if (type.IsValueType || type == typeof(string) || type == typeof(Guid))
    {
        return jsonValue;
    }
    if (type == typeof(DateTimeOffset))
    {
        return $"new DateTime({jsonValue})";
    }
    if (TypeDefintions.Contains(type) || typesToGenerate.Contains(type))
    {
        return $"{PhpType(type)}::hydrate({jsonValue})";
    }
    else
    {
        return "NULL";
    }
}

string PhpType(Type type) => type.Name switch
{
    "String" => "string",
    "Int32" => "int",
    "Int64" => "int",
    "float" => "float",
    "Double" => "float",
    "Decimal" => "float",
    "Boolean" => "bool",
    "Guid" => "string",
    "Byte" => "int",
    "DateTimeOffset" => "DateTime",
    var value when value.StartsWith("Nullable") => $"?{PhpType(type.GetGenericArguments()[0])}",
    var value when value.StartsWith("List") || value.StartsWith("Dictionary") || value.EndsWith("[]") => AddArrayTypeDefinition(type),
    _ when type.IsGenericType => AddGenericTypeDefinition(type),
    _ => AddTypeDefinition(type)
};

string AddTypeDefinition(Type type)
{
    if (TypeDefintions.Add(type))
    {
        typesToGenerate.Enqueue(type);
    }
    return type.Name.Replace("`1", "");
}

string AddArrayTypeDefinition(Type type)
{
    if (type.IsArray && type.GetElementType() is { } elementType)
    {
        PhpType(elementType);
        if (elementType.IsAbstract)
        {
            AddDerivedTypeDefinitions(elementType);
        }
    }
    else if (type.IsGenericType)
    {
        if (type.GetGenericTypeDefinition() == typeof(List<>))
        {
            PhpType(type.GetGenericArguments()[0]);
            if (type.GetGenericArguments()[0].IsAbstract)
            {
                AddDerivedTypeDefinitions(type.GetGenericArguments()[0]);
            }
        }
        else if (type.GetGenericTypeDefinition() == typeof(Dictionary<,>))
        {
            PhpType(type.GetGenericArguments()[0]);
            PhpType(type.GetGenericArguments()[1]);
            if (type.GetGenericArguments()[0].IsAbstract)
            {
                AddDerivedTypeDefinitions(type.GetGenericArguments()[0]);
            }
            if (type.GetGenericArguments()[1].IsAbstract)
            {
                AddDerivedTypeDefinitions(type.GetGenericArguments()[1]);
            }
        }
    }
    return "array";
}

string AddGenericTypeDefinition(Type type)
{
    if (type.GenericTypeArguments.Length == 1)
    {
        return $"{PhpType(type.GenericTypeArguments.Single())}{AddTypeDefinition(type)}";
    }
    else if (type.GenericTypeArguments.Length == 2)
    {
        return $"{PhpType(type.GenericTypeArguments.First())}{PhpType(type.GenericTypeArguments.Last())}{AddTypeDefinition(type)}";
    }
    var genericTypeArgumentDefinition = type.GetGenericArguments().Single();
    var genericTypeArgumentConstraint = genericTypeArgumentDefinition.GetGenericParameterConstraints().Single();
    if (genericTypeArgumentConstraint.IsAbstract)
    {
        return $"{AddDerivedTypeDefinitions(genericTypeArgumentConstraint)}{AddTypeDefinition(type)}";
    }

    return AddTypeDefinition(type);
}

string AddDerivedTypeDefinitions(Type type)
{
    AddTypeDefinition(type);
    var derivedTypes = assembly
        .GetTypes()
        .Where(derivingType => derivingType.IsAssignableFrom(type));
    // We do the extra work of generating classes for all the types that implement the 'genericTypeArgumentConstraint'
    foreach (var derivedType in derivedTypes.Skip(1))
    {
        AddTypeDefinition(derivedType);
    }
    return PhpType(derivedTypes.First());
}

void GenerateClientClass(Type requestType, Type clientType)
{
    HashSet<string> GeneratedMethods = new();

    using var streamWriter = File.CreateText($"{basePath}/{clientType.Name}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    var requestTypeMethods = assembly
        .GetTypes()
        .Where(derivingType => derivingType.IsSubclassOf(requestType))
        .Select(info =>
        {
            var typeName = PhpType(info);
            return (methodName: typeName, parameterType: typeName, parameterName: $"{Char.ToLower(typeName[0])}{typeName[1..]}");
        });

    var clientMethods = clientType
        .GetMethods()
        .Where(info => info.DeclaringType == clientType
                    && !info.Name.EndsWith("Async")
                    && info.GetParameters().Length is 1
                    && !info.GetParameters().First().ParameterType.IsGenericType
                    && info.GetParameters().First().ParameterType.IsClass
                    && info.GetParameters().First().ParameterType != requestType
                    && info.GetParameters().First().ParameterType.Name.EndsWith("Request")
        )
        .Select(info => (methodName: info.Name + PhpType(info.GetParameters().First().ParameterType), parameterType: PhpType(info.GetParameters().First().ParameterType), parameterName: info.GetParameters().First().Name!));

    writer.WriteLine($"""
<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
""");

    foreach (var method in requestTypeMethods.Union(clientMethods).DistinctBy(method => method.parameterType))
    {
        writer.WriteLine($"use Relewise\\Models\\DTO\\{method.parameterType};");
    }
    writer.WriteLine($"");

    writer.WriteLine($"class {clientType.Name} extends RelewiseClient");
    writer.WriteLine("{");
    writer.Indent++;
    foreach (var method in requestTypeMethods.Union(clientMethods))
    {
        writer.WriteLine($"public function {Char.ToLower(method.methodName[0])}{method.methodName[1..]}({method.parameterType} ${method.parameterName}) : Response");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"return $this->request(\"{method.parameterType}\", ${method.parameterName});");
        writer.Indent--;
        writer.WriteLine("}");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

#endregion