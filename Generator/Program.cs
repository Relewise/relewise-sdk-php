using Newtonsoft.Json;
using Relewise.Client.Requests;
using Relewise.Client.Responses;
using System.CodeDom.Compiler;
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

HashSet <Type> TypeDefintions = new();
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
    Console.WriteLine("// We are missing these still");
    foreach (var typeDefinition in MissingTypeDefintions)
    {
        Console.WriteLine($"// {typeDefinition.Name}");
    }
}


void WriteClass(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName)) return;
    using var streamWriter = File.CreateText($"{basePath}/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"{(type.IsAbstract ? "abstract " : "")}class {PhpType(type)}{(type.BaseType != typeof(object) && type.BaseType is { } baseType ? $" extends {PhpType(baseType)}" : "")}");
    writer.WriteLine("{");
    writer.Indent++;
    writer.WriteLine($"public string $type = \"{type.FullName}, Relewise.Client\";");
    var settableProperties = type.GetProperties().Where(info => info.MemberType is MemberTypes.Property
                                                                    && info.SetMethod is { IsAbstract: false }
                                                                    && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                                                                    && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                                                                    && (info.DeclaringType?.IsAbstract == type.IsAbstract)).ToArray();
    foreach (var propertyInfo in settableProperties)
    {
        writer.WriteLine($"public {PhpType(propertyInfo.PropertyType)} ${propertyInfo.Name};");
    }

    var parameterInformation = settableProperties.Select(info => (propertyType: PhpType(info.PropertyType), propertyName: info.Name, paramName: $"{Char.ToLower(info.Name[0])}{info.Name[1..]}")).ToArray();
    
    writer.WriteLine($"public function __construct() {{ }}");
    writer.WriteLine("public static function create()");
    writer.WriteLine("{");
    writer.Indent++;
    writer.WriteLine($"return new {typeName}();");
    writer.Indent--;
    writer.WriteLine("}");

    foreach (var (propertyType, propertyName, paramName) in parameterInformation)
    {
        writer.WriteLine($"function with{propertyName}({propertyType} ${paramName})");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$this->{propertyName} = ${paramName};");
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
    using var streamWriter = File.CreateText($"{basePath}/{typeName}.php");
    using var writer = new IndentedTextWriter(streamWriter);

    writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
    writer.WriteLine($"enum {type.Name.Replace("`1", "")}");
    writer.WriteLine("{");
    writer.Indent++;
    foreach (var enumName in type.GetMembers().Where(propertyInfo => propertyInfo.DeclaringType is { IsEnum: true } && propertyInfo.Name is not "__value" and not "value__"))
    {
        writer.WriteLine($"case {enumName.Name};");
    }
    writer.Indent--;
    writer.WriteLine("}");
}

void WriteInterface(Type type)
{
    var typeName = PhpType(type);
    if (!GeneratedTypeNames.Add(typeName)) return;
    using var streamWriter = File.CreateText($"{basePath}/{typeName}.php");
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

string PhpType(Type type)
{
    return type.Name switch
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
        var derivedTypes = assembly
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