using Generator.PhpMemberWriters;
using Generator.PhpTypeWriters;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator;

public class PhpWriter
{
    private readonly List<IPhpTypeWriter> phpTypeWriters;
    private readonly PhpTypeResolver phpTypeResolver;

    public HashSet<Type> MissingTypeDefinitions { get; set; } = new();
    public Assembly Assembly { get; }
    public string BasePath { get; }
    public XmlDocumentation XmlDocumentation { get; }
    public PhpHydrationMethodsWriter PhpHydrationMethodsWriter { get; }
    public PhpCreatorMethodWriter PhpCreatorMethodWriter { get; }
    public PhpPropertySetterMethodsWriter PhpPropertySetterMethodsWriter { get; }
    public PhpStaticReadonlyPropertiesWriter PhpStaticReadonlyPropertiesWriter { get; }
    public PhpSettablePropertiesWriter PhpSettablePropertiesWriter { get; }

    public PhpWriter(Assembly assembly, string basePath, XmlDocumentation xmlDocumentation)
    {
        phpTypeWriters = new List<IPhpTypeWriter>() { new PhpClassWriter(this), new PhpInterfaceWriter(this), new PhpEnumWriter(this), new PhpKeyValuePairWriter(this) };
        phpTypeResolver = new PhpTypeResolver(assembly);
        Assembly = assembly;
        BasePath = basePath;
        XmlDocumentation = xmlDocumentation;
        PhpHydrationMethodsWriter = new PhpHydrationMethodsWriter(this);
        PhpCreatorMethodWriter = new PhpCreatorMethodWriter(this);
        PhpPropertySetterMethodsWriter = new PhpPropertySetterMethodsWriter(this);
        PhpStaticReadonlyPropertiesWriter = new PhpStaticReadonlyPropertiesWriter(this);
        PhpSettablePropertiesWriter = new PhpSettablePropertiesWriter(this);
        xmlDocumentation.PhpWriter = this;
    }

    public void WritePhpTypes(IEnumerable<Type> types)
    {
        foreach (var type in types)
        {
            phpTypeResolver.TypesToGenerate.Enqueue(type);
        }

        while (phpTypeResolver.TypesToGenerate.Count > 0)
        {
            var type = phpTypeResolver.TypesToGenerate.Dequeue();

            var potentialNullableTypeName = PhpTypeName(type);
            var typeName = potentialNullableTypeName[0] is '?' ? potentialNullableTypeName[1..] : potentialNullableTypeName;

            if (phpTypeResolver.IsWritten(typeName)) continue;

            if ((type.IsGenericTypeDefinition || type.IsGenericTypeParameter || typeName.Contains("d__")))
            {
                continue;
            }

            using var streamWriter = File.CreateText($"{BasePath}/{Constants.GenerationFolderPath}/{typeName}.php");
            using var writer = new IndentedTextWriter(streamWriter);

            var phpTypeWriter = phpTypeWriters.FirstOrDefault(writer => writer.CanWrite(type));
            if (phpTypeWriter is null)
            {
                MissingTypeDefinitions.Add(type);
            }
            else
            {
                phpTypeWriter.Write(writer, type, typeName);
                phpTypeResolver.HasWritten(typeName);
            }
        }
    }

    public string PhpTypeName(Type type) => phpTypeResolver.ResolveType(type);

    public string PhpTypeName(PropertyInfo property)
    {
        var typeName = PhpTypeName(property.PropertyType);
        return PrependNullableIfApplicable(typeName, new NullabilityInfoContext().Create(property));
    }

    public string PhpTypeName(ParameterInfo property)
    {
        var typeName = PhpTypeName(property.ParameterType);
        return PrependNullableIfApplicable(typeName, new NullabilityInfoContext().Create(property));
    }

    private static string PrependNullableIfApplicable(string typeName, NullabilityInfo nullabilityInfo)
    {
        if (!typeName.StartsWith('?')
            && typeName != "mixed"
            && nullabilityInfo.WriteState is NullabilityState.Nullable)
        {
            return $"?{typeName}";
        }
        return typeName;
    }

    public string BetterTypedParameterTypeName(string parameterTypeName, Type propertyType)
    {
        if (parameterTypeName is not "array" and not "?array")
        {
            return parameterTypeName;
        }

        if (propertyType.IsArray)
        {
            return PhpTypeName(propertyType.GetElementType()!) + " ...";
        }

        if (propertyType.IsGenericType
            && propertyType.GetGenericTypeDefinition() == typeof(List<>)
            && propertyType.GenericTypeArguments is [var elementType])
        {
            return PhpTypeName(elementType) + " ...";
        }

        if (propertyType.IsGenericType
            && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>))
        {
            return parameterTypeName;
        }

        return "...";
    }

    public string DocumentationParameterTypeName(string typeName, Type type)
    {
        if (!typeName.EndsWith("array"))
        {
            return typeName;
        }

        if (type.IsArray)
        {
            return typeName.Replace("array", $"{PhpTypeName(type.GetElementType()!)}[]");
        }
        if (type.IsGenericType && (type.GetGenericTypeDefinition() == typeof(List<>) || type.GetGenericTypeDefinition() == typeof(IEnumerable<>)))
        {
            return typeName.Replace("array", $"{PhpTypeName(type.GetGenericArguments()[0])}[]");
        }
        if (type.IsGenericType && type.GetGenericTypeDefinition() == typeof(Dictionary<,>))
        {
            return typeName.Replace("array", $"array<{PhpTypeName(type.GetGenericArguments()[0])}, {PhpTypeName(type.GetGenericArguments()[1])}>");
        }

        throw new NotSupportedException($"Haven't supported this type for PHPDoc: {type.Name}");
    }
}
