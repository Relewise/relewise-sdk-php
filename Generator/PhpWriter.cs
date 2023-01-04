﻿using Generator.PhpMethodWriters;
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
    public PhpHydrationMethodsWriter PhpHydrationMethodsWriter { get; }
    public PhpCreatorMethodWriter PhpCreatorMethodWriter { get; }
    public PhpPropertySetterMethodsWriter PhpPropertySetterMethodsWriter { get; }

    public PhpWriter(Assembly assembly, string basePath)
    {
        phpTypeWriters = new List<IPhpTypeWriter>() { new PhpClassWriter(this), new PhpInterfaceWriter(this), new PhpEnumWriter(this), new PhpKeyValuePairWriter(this) };
        phpTypeResolver = new PhpTypeResolver(assembly);
        Assembly = assembly;
        BasePath = basePath;
        PhpHydrationMethodsWriter = new PhpHydrationMethodsWriter(this);
        PhpCreatorMethodWriter = new PhpCreatorMethodWriter(this);
        PhpPropertySetterMethodsWriter = new PhpPropertySetterMethodsWriter(this);
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

            using var streamWriter = File.CreateText($"{BasePath}/Models/DTO/{typeName}.php");
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

    public string BetterTypedParameterTypeName(string propertyTypeName, Type propertyType)
    {
        return propertyTypeName is "array"
            ? propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>) &&
              propertyType.GenericTypeArguments is [var elementType]
                ? PhpTypeName(elementType) + " ..."
                : propertyType.IsArray
                    ? PhpTypeName(propertyType.GetElementType()!) + " ..."
                    : "..."
            : propertyTypeName;
    }
}
