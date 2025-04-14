using System.Reflection;
using System.Text.RegularExpressions;

namespace Generator;

public class PhpTypeResolver
{
    private readonly Assembly assembly;
    private Dictionary<Type, string> typeDefintions { get; } = new();

    public HashSet<string> GeneratedFileNames { get; } = new();
    public Queue<Type> TypesToGenerate { get; } = new();

    public PhpTypeResolver(Assembly assembly)
    {
        this.assembly = assembly;
    }

    public string ResolveType(Type type) => type.Name switch
    {
        "String" or "Guid" => "string",
        "Int32" or "Int64" or "UInt16" or "Byte" => "int",
        "Float" or "Double" or "Decimal" or "Single" => "float",
        "Boolean" => "bool",
        "Object" => "mixed",
        "DateTimeOffset" or "DateTime" => "DateTime",
        var value when value.StartsWith("Nullable") => $"?{ResolveType(type.GetGenericArguments()[0])}",
        var value when value.StartsWith("List") || value.StartsWith("Dictionary") || value.EndsWith("[]") || value.StartsWith("IEnumerable") => AddCollectionTypeDefinition(type),
        _ when type.IsGenericType => GetGenericTypeDefinition(type),
        _ => GetOrAddTypeDefinition(type)
    };

    public bool IsWritten(string typeName) => GeneratedFileNames.Contains(typeName);
    public void HasWritten(string typeName) => GeneratedFileNames.Add(typeName);

    private string GetOrAddTypeDefinition(Type type)
    {
        if (typeDefintions.TryGetValue(type, out var value))
        {
            return value;
        }

        var typeName = GetTypeName(type);
        typeDefintions.Add(type, typeName);
        TypesToGenerate.Enqueue(type);
        AddDerivedTypeDefinitions(type);
        return typeName;
    }

    private static string GetTypeName(Type type)
    {
        var name = type.Name;

        Type? typeToPrependToName = type.DeclaringType;
        while (typeToPrependToName is not null)
        {
            name = typeToPrependToName.Name + name;
            
            typeToPrependToName = typeToPrependToName.DeclaringType;
        }

        return Regex.Replace(name, @"`\d+", "");
    }

    private string AddCollectionTypeDefinition(Type type)
    {
        if (type.IsArray && type.GetElementType() is { } elementType)
        {
            ResolveType(elementType);
        }
        else if (type.IsGenericType)
        {
            if (type.GetGenericTypeDefinition() == typeof(List<>) || type.GetGenericTypeDefinition() == typeof(IEnumerable<>))
            {
                ResolveType(type.GetGenericArguments()[0]);
            }
            else if (type.GetGenericTypeDefinition() == typeof(Dictionary<,>))
            {
                ResolveType(type.GetGenericArguments()[0]);
                ResolveType(type.GetGenericArguments()[1]);
            }
        }
        return "array";
    }

    private string GetGenericTypeDefinition(Type type)
    {
        if (type.GenericTypeArguments.Length >= 1)
        {
            return string.Join("", type.GenericTypeArguments.Select(t => ResolveType(t))) + GetOrAddTypeDefinition(type);
        }

        if (type.GetGenericArguments() is not [var genericTypeArgumentDefinition])
        {
            return GetOrAddTypeDefinition(type);
        }

        if (genericTypeArgumentDefinition.GetGenericParameterConstraints() is not [var genericTypeArgumentConstraint])
        {
            return GetOrAddTypeDefinition(type);
        }

        GetOrAddTypeDefinition(genericTypeArgumentConstraint);
        if (AddDerivedTypeDefinitions(genericTypeArgumentConstraint) is { } concreteTypeName)
        {
            return $"{concreteTypeName}{GetOrAddTypeDefinition(type)}";
        }

        return GetOrAddTypeDefinition(type);
    }

    private string? AddDerivedTypeDefinitions(Type type)
    {
        if (!type.IsAbstract)
        {
            return null;
        }
        var derivedTypes = assembly
            .GetTypes()
            .Where(derivingType => derivingType != type && derivingType.IsAssignableTo(type) && !derivingType.IsGenericType)
            .Distinct()
            .ToArray();
        if (derivedTypes.Length is 0)
        {
            return null;
        }
        // We do the extra work of generating classes for all the types that implement the 'genericTypeArgumentConstraint'
        foreach (var derivedType in derivedTypes.Skip(1))
        {
            GetOrAddTypeDefinition(derivedType);
        }
        return ResolveType(derivedTypes.First());
    }
}