﻿using Newtonsoft.Json;
using Relewise.Client;
using Relewise.Client.Requests;
using Relewise.Client.Responses;
using Relewise.Client.Search;
using System.CodeDom.Compiler;
using System.Globalization;
using System.Reflection;
using static System.Runtime.InteropServices.JavaScript.JSType;

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

Queue<Type> TypesToGenerate = new();

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

while (TypesToGenerate.Count > 0)
{
    var type = TypesToGenerate.Dequeue();
    if (type.IsClass && !(type.IsAbstract && type.IsGenericType && type.GenericTypeArguments.Length == 0))
    {
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

GenerateClientClass(typeof(Tracker), new[] { "Track" });
GenerateClientClass(typeof(Searcher), new[] { "Search", "Predict", "Batch" });
GenerateClientClass(typeof(Recommender), new[] { "Recommend" });

#region Type Writers

void WriteClass(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName) || typeName[0] is '?') return;
    using var streamWriter = File.CreateText($"{basePath}/Models/DTO/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"{(type.IsAbstract ? "abstract " : "")}class {PhpType(type)}{(type.BaseType != typeof(object) && type.BaseType is { } baseType ? $" extends {PhpType(baseType).Replace("?", "")}" : "")}");
    writer.WriteLine("{");
    writer.Indent++;
    if (type.BaseType != typeof(object) && type.BaseType is { } extended && extended.IsAbstract || type.IsAbstract)
    {
        writer.WriteLine($"public string $typeDefinition = \"{type.FullName}, {type.Assembly.FullName.Split(",")[0]}\";");
    }
    var settableProperties = type.GetProperties().Where(info => info.MemberType is MemberTypes.Property
                                                                && info.GetIndexParameters().Length is 0
                                                                && info.SetMethod is { IsAbstract: false }
                                                                && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                                                                && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                                                                && (info.DeclaringType?.IsAbstract == type.IsAbstract)).ToArray();
    foreach (var propertyInfo in settableProperties)
    {
        WriteProperty(writer, type, propertyInfo);
    }

    var parameterInformation = settableProperties.Select(info => (type: info.PropertyType, propertyTypeName: PhpType(info.PropertyType), propertyName: info.Name, lowerCaseName: $"{ToCamelCase(info.Name)}")).ToArray();

    WriteHydrationAndCreatorMethod(writer, type, parameterInformation);

    foreach (var (propertyType, propertyTypeName, propertyName, lowerCaseName) in parameterInformation)
    {
        if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>) && propertyType.GenericTypeArguments is [var keyType, var valueType])
        {
            writer.WriteLine($"function with{propertyName}({PhpType(keyType)} $key, {PhpType(valueType)} $value)");
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
            var parameterType = propertyTypeName is "array" ? propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>) && propertyType.GenericTypeArguments is [var listType] ? PhpType(listType) + " ..." : propertyType.IsArray ? PhpType(propertyType.GetElementType()!) + " ..." : "..." : propertyTypeName;
            writer.WriteLine($"function with{propertyName}({parameterType} ${lowerCaseName})");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"$this->{lowerCaseName} = ${lowerCaseName};");
            writer.WriteLine("return $this;");
            writer.Indent--;
            writer.WriteLine("}");
        }
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteEnum(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName) || typeName[0] is '?') return;
    using var streamWriter = File.CreateText($"{basePath}/Models/DTO/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"enum {typeName} : string");
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
    if (!GeneratedTypeNames.Add(typeName) || typeName[0] is '?') return;
    using var streamWriter = File.CreateText($"{basePath}/Models/DTO/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine("// This is actually an interface.");
    writer.WriteLine($"abstract class {typeName}");
    writer.WriteLine("{");
    writer.Indent++;
    WriteHydrationAndCreatorMethod(writer, type, Array.Empty<(Type, string, string, string)>());
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteProperty(IndentedTextWriter writer, Type type, PropertyInfo propertyInfo)
{
    writer.WriteLine($"public {PhpType(propertyInfo.PropertyType)} ${ToCamelCase(propertyInfo.Name)};");
}

#endregion

#region Add Type Definitions

string AddTypeDefinition(Type type)
{
    if (TypeDefintions.Add(type))
    {
        TypesToGenerate.Enqueue(type);
        AddDerivedTypeDefinitions(type);
    }
    return type.Name.Replace("`1", "").Replace("`2", "");
}

string AddCollectionTypeDefinition(Type type)
{
    if (type.IsArray && type.GetElementType() is { } elementType)
    {
        PhpType(elementType);
    }
    else if (type.IsGenericType)
    {
        if (type.GetGenericTypeDefinition() == typeof(List<>))
        {
            PhpType(type.GetGenericArguments()[0]);
        }
        else if (type.GetGenericTypeDefinition() == typeof(Dictionary<,>))
        {
            PhpType(type.GetGenericArguments()[0]);
            PhpType(type.GetGenericArguments()[1]);
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
    if (type.GenericTypeArguments.Length == 2)
    {
        return $"{PhpType(type.GenericTypeArguments.First())}{PhpType(type.GenericTypeArguments.Last())}{AddTypeDefinition(type)}";
    }

    if (type.GetGenericArguments() is not [var genericTypeArgumentDefinition])
    {
        return AddTypeDefinition(type);
    }

    if (genericTypeArgumentDefinition.GetGenericParameterConstraints() is not [var genericTypeArgumentConstraint])
    {
        return AddTypeDefinition(type);
    }

    AddTypeDefinition(genericTypeArgumentConstraint);
    if (AddDerivedTypeDefinitions(genericTypeArgumentConstraint) is { } concreteTypeName)
    {
        return $"{concreteTypeName}{AddTypeDefinition(type)}";
    }

    return AddTypeDefinition(type);
}

string? AddDerivedTypeDefinitions(Type type)
{
    if (!type.IsAbstract)
    {
        return null;
    }
    var derivedTypes = assembly!
        .GetTypes()
        .Where(derivingType => derivingType != type && derivingType.IsAssignableTo(type) && !derivingType.IsGenericType)
        .Distinct()
        .ToArray();
    if (derivedTypes.Count() is 0)
    {
        return null;
    }
    // We do the extra work of generating classes for all the types that implement the 'genericTypeArgumentConstraint'
    foreach (var derivedType in derivedTypes.Skip(1))
    {
        AddTypeDefinition(derivedType);
    }
    return PhpType(derivedTypes.First());
}

#endregion

#region Hydration Generation

void WriteHydrationAndCreatorMethod(IndentedTextWriter writer, Type type, (Type type, string propertyTypeName, string propertyName, string lowerCaseName)[] parameterInformation)
{
    if (type.IsAbstract || type.IsInterface)
    {
        writer.WriteLine("public static function hydrate(array $arr)");
        writer.WriteLine("{");
        writer.Indent++;

        var derivedTypes = assembly
            .GetTypes()
            .Where(derivingType => derivingType.IsAssignableTo(type)
                                   && !derivingType.IsGenericType
                                   && !derivingType.IsAbstract)
            .DistinctBy(PhpType)
            .ToArray();
        writer.WriteLine("$type = $arr[\"\\$type\"];");
        foreach (var derivedType in derivedTypes)
        {
            writer.WriteLine($"if ($type==\"{derivedType.FullName}, {type.Assembly.FullName?.Split(",")[0]}\")");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine($"return {PhpType(derivedType)}::hydrate($arr);");
            writer.Indent--;
            writer.WriteLine("}");
        }

        writer.Indent--;
        writer.WriteLine("}");

        writer.WriteLine($"public static function hydrateBase(mixed $result, array $arr)");
        writer.WriteLine("{");
        writer.Indent++;
        if (type.BaseType is { IsAbstract: true } abstractBase)
        {
            writer.WriteLine($"$result = {PhpType(abstractBase).Replace("?", "")}::hydrateBase($result, $arr);");
        }
        foreach (var (propertyType, _, propertyName, lowerCaseName) in parameterInformation)
        {
            WriteHydrationSetter(writer, propertyType, propertyName, lowerCaseName);
        }
        writer.WriteLine("return $result;");
        writer.Indent--;
        writer.WriteLine("}");
    }
    else
    {
        var typeName = PhpType(type);
        writer.WriteLine($"public static function create() : {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$result = new {typeName}();");

        var defaultValueParameterizedProperties = type.GetConstructors()
            .SelectMany(constructor => constructor.GetParameters())
            .Where(parameter => parameter.HasDefaultValue &&
                                type.GetProperties().Any(property => ToCamelCase(property.Name) == parameter.Name)
                                && parameter.DefaultValue is not null)
            .DistinctBy(parameter => parameter.Name);
        foreach (var parameter in defaultValueParameterizedProperties)
        {
            writer.WriteLine($"$result->{parameter.Name} = {LiteralValueExpression(parameter.DefaultValue!)};");
        }

        writer.WriteLine("return $result;");
        writer.Indent--;
        writer.WriteLine("}");

        writer.WriteLine($"public static function hydrate(array $arr) : {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        if (type.BaseType is { IsAbstract: true } abstractBase)
        {
            writer.WriteLine($"$result = {PhpType(abstractBase).Replace("?", "")}::hydrateBase(new {typeName}(), $arr);");
        }
        else
        {
            writer.WriteLine($"$result = new {typeName}();");
        }
        foreach (var (propertyType, _, propertyName, lowerCaseName) in parameterInformation)
        {
            WriteHydrationSetter(writer, propertyType, propertyName, lowerCaseName);
        }
        writer.WriteLine($"return $result;");
        writer.Indent--;
        writer.WriteLine("}");
    }
}

void WriteHydrationSetter(IndentedTextWriter writer, Type propertyType, string propertyName, string lowerCaseName)
{
    writer.WriteLine($"if (array_key_exists(\"{lowerCaseName}\", $arr))");
    writer.WriteLine("{");
    writer.Indent++;
    if (propertyType.IsArray && propertyType.GetElementType() is { } elementType)
    {
        WriteArrayLikeHydrationSetter(writer, elementType, propertyName, lowerCaseName);
    }
    else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>))
    {
        WriteArrayLikeHydrationSetter(writer, propertyType.GenericTypeArguments.Single(), propertyName, lowerCaseName);
    }
    else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>))
    {
        WriteDictionaryHydrationSetter(writer, propertyType.GenericTypeArguments[0], propertyType.GenericTypeArguments[1], propertyName, lowerCaseName);
    }
    else
    {
        writer.WriteLine($"$result->{lowerCaseName} = {HydrationExpression(propertyType, $"$arr[\"{lowerCaseName}\"]")};");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteArrayLikeHydrationSetter(IndentedTextWriter writer, Type elementType, string propertyName, string lowerCaseName)
{
    writer.WriteLine($"$result->{lowerCaseName} = array();");
    writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as &$value)");
    writer.WriteLine("{");
    writer.Indent++;
    writer.WriteLine($"array_push($result->{lowerCaseName}, {HydrationExpression(elementType, "$value")});");
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteDictionaryHydrationSetter(IndentedTextWriter writer, Type keyType, Type valueType, string propertyName, string lowerCaseName)
{
    writer.WriteLine($"$result->{lowerCaseName} = array();");
    writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as $key => $value)");
    writer.WriteLine("{");
    writer.Indent++;
    writer.WriteLine($"$result->{lowerCaseName}[{HydrationExpression(keyType, "$key")}] = {HydrationExpression(valueType, "$value")};");
    writer.Indent--;
    writer.WriteLine("}");
}

string HydrationExpression(Type type, string jsonValue)
{
    if (type.IsEnum)
    {
        return $"{PhpType(type)}::from({jsonValue})";
    }
    if (type.IsValueType || type == typeof(string) || type == typeof(Guid) || type == typeof(object))
    {
        return jsonValue;
    }
    if (type == typeof(DateTimeOffset))
    {
        return $"new DateTime({jsonValue})";
    }
    if (TypeDefintions.Contains(type) || TypesToGenerate.Contains(type))
    {
        return $"{PhpType(type).Replace("?", "")}::hydrate({jsonValue})";
    }
    return "NULL";
}

string LiteralValueExpression(object obj)
{
    return obj switch
    {
        int number => $"{number}",
        double number => $"{number.ToString(CultureInfo.InvariantCulture)}",
        float number => $"{number.ToString(CultureInfo.InvariantCulture)}",
        string stringLiteral => $"\"{stringLiteral}\"",
        _ when obj.GetType().IsEnum => $"{PhpType(obj.GetType())}::{obj}",
        _ => System.Text.Json.JsonSerializer.Serialize(obj)
    };
}

#endregion

#region Generate Clients

void GenerateClientClass(Type clientType, string[] clientMethodNames)
{
    using var streamWriter = File.CreateText($"{basePath}/{clientType.Name}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    var clientMethods = clientType
        .GetMethods()
        .Where(info => info.DeclaringType == clientType
                       && clientMethodNames.Contains(info.Name)
                       && info.GetParameters().Length is 1
                       && !info.GetParameters().First().ParameterType.IsGenericType
                       && !info.GetParameters().First().ParameterType.IsArray
                       && info.GetParameters().First().ParameterType.IsClass
                       && info.GetParameters().First().ParameterType.IsAssignableTo(typeof(LicensedRequest))
        )
        .SelectMany(info => info.GetParameters().First().ParameterType.IsAbstract
            ? assembly
                .GetTypes()
                .Where(derivingType => !derivingType.IsGenericType && derivingType.IsAssignableTo(info.GetParameters().First().ParameterType))
                .Select(derivedType => (
                    methodName: ToCamelCase(PhpType(derivedType)),
                    parameterType: PhpType(derivedType),
                    parameterName: info.GetParameters().First().Name!,
                    returnType: info.ReturnType))
            : new[]
            {
                (
                    methodName: ToCamelCase(PhpType(info.GetParameters().First().ParameterType)),
                    parameterType: PhpType(info.GetParameters().First().ParameterType),
                    parameterName: info.GetParameters().First().Name!,
                    returnType: info.ReturnType)
            })
        .ToArray();

    writer.WriteLine($"""
<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
""");

    foreach (var method in clientMethods.DistinctBy(method => method.parameterType))
    {
        writer.WriteLine($"use Relewise\\Models\\DTO\\{method.parameterType};");
    }
    foreach (var method in clientMethods.DistinctBy(method => method.returnType).Where(method => method.returnType != typeof(void)))
    {
        writer.WriteLine($"use Relewise\\Models\\DTO\\{PhpType(method.returnType)};");
    }
    writer.WriteLine($"");

    writer.WriteLine($"class {clientType.Name} extends RelewiseClient");
    writer.WriteLine("{");
    writer.Indent++;
    foreach (var method in clientMethods.DistinctBy(method => method.parameterType))
    {
        var methodName = method.methodName.EndsWith("Request") ? ToCamelCase(method.methodName[..^7]) : method.methodName.EndsWith("RequestCollection") ? $"batch{method.methodName[..^17]}" : ToCamelCase(method.methodName);
        writer.WriteLine($"public function {methodName}({method.parameterType} ${method.parameterName}){(method.returnType != typeof(void) ? $" : ?{PhpType(method.returnType)}" : "")}");
        writer.WriteLine("{");
        writer.Indent++;
        if (method.returnType == typeof(void))
        {
            writer.WriteLine($"return $this->requestAndValidate(\"{method.parameterType}\", ${method.parameterName});");
        }
        else
        {
            writer.WriteLine($"$response = $this->requestAndValidate(\"{method.parameterType}\", ${method.parameterName});");
            writer.WriteLine("if ($response == Null)");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine("return Null;");
            writer.Indent--;
            writer.WriteLine("}");
            writer.WriteLine($"return {PhpType(method.returnType)}::hydrate($response);");
        }
        writer.Indent--;
        writer.WriteLine("}");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

#endregion

#region Helper methods

string PhpType(Type type) => type.Name switch
{
    "String" => "string",
    "Int32" => "int",
    "Int64" => "int",
    "UInt16" => "int",
    "Single" => "int",
    "float" => "float",
    "Double" => "float",
    "Decimal" => "float",
    "Boolean" => "bool",
    "Guid" => "string",
    "Byte" => "int",
    "Object" => "mixed",
    "DateTimeOffset" => "DateTime",
    var value when value.StartsWith("Nullable") => $"?{PhpType(type.GetGenericArguments()[0])}",
    var value when value.StartsWith("List") || value.StartsWith("Dictionary") || value.EndsWith("[]") => AddCollectionTypeDefinition(type),
    _ when type.IsGenericType => AddGenericTypeDefinition(type),
    _ => AddTypeDefinition(type)
};

string ToCamelCase(string input)
{
    return char.ToLower(input[0]) + input[1..];
}

#endregion