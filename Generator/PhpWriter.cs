using Generator.PhpMemberWriters;
using Generator.PhpTypeWriters;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator;

public class PhpWriter
{
    private readonly List<IPhpTypeWriter> _phpTypeWriters;
    private readonly PhpTypeResolver _phpTypeResolver;

    public HashSet<Type> MissingTypeDefinitions { get; set; } = new();
    public Assembly Assembly { get; }
    public string BasePath { get; }
    public XmlDocumentation XmlDocumentation { get; }
    public PhpHydrationMethodsWriter PhpHydrationMethodsWriter { get; }
    public PhpCreatorMethodWriter PhpCreatorMethodWriter { get; }
    public PhpPropertySetterMethodsWriter PhpPropertySetterMethodsWriter { get; }
    public PhpStaticReadonlyPropertiesWriter PhpStaticReadonlyPropertiesWriter { get; }
    public PhpSettablePropertiesWriter PhpSettablePropertiesWriter { get; }
    public PhpJsonSerializerMethodWriter PhpJsonSerializerMethodWriter { get; }

    public PhpWriter(Assembly assembly, string basePath, XmlDocumentation xmlDocumentation)
    {
        _phpTypeWriters = new List<IPhpTypeWriter> { new PhpInterfaceWriter(this), new PhpEnumWriter(this), new PhpKeyValuePairWriter(this), new PhpClassWriter(this) };
        _phpTypeResolver = new PhpTypeResolver(assembly);
        Assembly = assembly;
        BasePath = basePath;
        XmlDocumentation = xmlDocumentation;
        PhpHydrationMethodsWriter = new PhpHydrationMethodsWriter(this);
        PhpCreatorMethodWriter = new PhpCreatorMethodWriter(this);
        PhpPropertySetterMethodsWriter = new PhpPropertySetterMethodsWriter(this);
        PhpStaticReadonlyPropertiesWriter = new PhpStaticReadonlyPropertiesWriter(this);
        PhpSettablePropertiesWriter = new PhpSettablePropertiesWriter(this);
        PhpJsonSerializerMethodWriter = new PhpJsonSerializerMethodWriter(this);
        xmlDocumentation.PhpWriter = this;
    }

    public void WritePhpTypes(IEnumerable<Type> types)
    {
        foreach (Type type in types)
        {
            _phpTypeResolver.TypesToGenerate.Enqueue(type);
        }

        while (_phpTypeResolver.TypesToGenerate.Count > 0)
        {
            Type type = _phpTypeResolver.TypesToGenerate.Dequeue();

            if (type == typeof(object) || type == typeof(ValueType) || type == typeof(Enum))
                continue;

            string potentialNullableTypeName = PhpTypeName(type);
            string typeName = potentialNullableTypeName.Replace("?", string.Empty);

            if (_phpTypeResolver.IsWritten(typeName)) continue;

            if ((type.IsGenericTypeDefinition || type.IsGenericTypeParameter || typeName.Contains("d__")))
                continue;

            using StreamWriter streamWriter = File.CreateText($"{BasePath}/{Constants.GenerationFolderPath}/{typeName}.php");
            using var writer = new IndentedTextWriter(streamWriter);

            IPhpTypeWriter? phpTypeWriter = _phpTypeWriters.FirstOrDefault(w => w.CanWrite(type));
            if (phpTypeWriter is null)
            {
                MissingTypeDefinitions.Add(type);
            }
            else
            {
                phpTypeWriter.Write(writer, type, typeName);
                _phpTypeResolver.HasWritten(typeName);
            }
        }
    }

    public string PhpTypeName(Type type) => _phpTypeResolver.ResolveType(type);

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
