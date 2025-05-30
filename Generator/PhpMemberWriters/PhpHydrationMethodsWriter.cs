﻿using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpMemberWriters;

public class PhpHydrationMethodsWriter
{
    private readonly PhpWriter phpWriter;

    public PhpHydrationMethodsWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type type, string typeName, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        if (type.IsAbstract || type.IsInterface)
        {
            writer.WriteLine();
            writer.WriteLine("public static function hydrate(array $arr)");
            writer.WriteLine("{");
            writer.Indent++;

            var derivedTypes = phpWriter.Assembly
                .GetTypes()
                .Where(derivingType => derivingType.IsAssignableTo(type)
                                       && derivingType.IsClass
                                       && !derivingType.IsGenericType
                                       && !derivingType.IsAbstract
                                       && !phpWriter.PhpTypeName(derivingType).Contains("d__"))
                .DistinctBy(phpWriter.PhpTypeName)
                .ToArray();
            writer.WriteLine("$type = $arr[\"\\$type\"];");
            foreach (var derivedType in derivedTypes)
            {
                writer.WriteLine($"if ($type==\"{derivedType.FullName}, {type.Assembly.FullName?.Split(",")[0]}\")");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"return {phpWriter.PhpTypeName(derivedType)}::hydrate($arr);");
                writer.Indent--;
                writer.WriteLine("}");
            }

            writer.Indent--;
            writer.WriteLine("}");

            writer.WriteLine();
            writer.WriteLine("public static function hydrateBase(mixed $result, array $arr)");
            writer.WriteLine("{");
            writer.Indent++;
            if (type.BaseType is { IsAbstract: true } abstractBase)
            {
                writer.WriteLine($"$result = {phpWriter.PhpTypeName(abstractBase).Replace("?", "")}::hydrateBase($result, $arr);");
            }
            foreach (var (info, _, _, lowerCaseName) in propertyInformations)
            {
                WriteHydrationSetter(writer, info.PropertyType, lowerCaseName);
            }
            writer.WriteLine("return $result;");
            writer.Indent--;
            writer.WriteLine("}");
        }
        else
        {
            writer.WriteLine();
            writer.WriteLine($"public static function hydrate(array $arr) : {typeName}");
            writer.WriteLine("{");
            writer.Indent++;
            if (type.BaseType != typeof(ValueType) && type.BaseType is { IsAbstract: true } abstractBase)
            {
                writer.WriteLine($"$result = {phpWriter.PhpTypeName(abstractBase).Replace("?", "")}::hydrateBase(new {typeName}(), $arr);");
            }
            else
            {
                writer.WriteLine($"$result = new {typeName}();");
            }
            foreach (var (info, _, _, lowerCaseName) in propertyInformations)
            {
                WriteHydrationSetter(writer, info.PropertyType, lowerCaseName);
            }
            writer.WriteLine($"return $result;");
            writer.Indent--;
            writer.WriteLine("}");
        }
    }

    private void WriteHydrationSetter(IndentedTextWriter writer, Type propertyType, string lowerCaseName)
    {
        writer.WriteLine($"if (array_key_exists(\"{lowerCaseName}\", $arr))");
        writer.WriteLine("{");
        writer.Indent++;
        if (propertyType.IsArray && propertyType.GetElementType() is { } elementType)
        {
            WriteArrayLikeHydrationSetter(writer, elementType, lowerCaseName);
        }
        else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>))
        {
            WriteArrayLikeHydrationSetter(writer, propertyType.GenericTypeArguments.Single(), lowerCaseName);
        }
        else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>))
        {
            WriteDictionaryHydrationSetter(writer, propertyType.GenericTypeArguments[0], propertyType.GenericTypeArguments[1], lowerCaseName);
        }
        else
        {
            writer.WriteLine($"$result->{lowerCaseName} = {HydrationExpression(propertyType, $"$arr[\"{lowerCaseName}\"]")};");
        }
        writer.Indent--;
        writer.WriteLine("}");
    }

    private void WriteArrayLikeHydrationSetter(IndentedTextWriter writer, Type elementType, string lowerCaseName)
    {
        writer.WriteLine($"$result->{lowerCaseName} = array();");
        writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as &$value)");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"array_push($result->{lowerCaseName}, {HydrationExpression(elementType, "$value")});");
        writer.Indent--;
        writer.WriteLine("}");
    }

    private void WriteDictionaryHydrationSetter(IndentedTextWriter writer, Type keyType, Type valueType, string lowerCaseName)
    {
        writer.WriteLine($"$result->{lowerCaseName} = array();");
        writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as $key => $value)");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$result->{lowerCaseName}[{HydrationExpression(keyType, "$key")}] = {HydrationExpression(valueType, "$value")};");
        writer.Indent--;
        writer.WriteLine("}");
    }

    private string HydrationExpression(Type type, string jsonValue)
    {
        if (Nullable.GetUnderlyingType(type) is { } underlyingType)
        {
            return HydrationExpression(underlyingType, jsonValue);
        }
        if (type.IsEnum)
        {
            return $"{phpWriter.PhpTypeName(type)}::from({jsonValue})";
        }
        if (type == typeof(DateTimeOffset) || type == typeof(DateTime))
        {
            return $"new DateTime({jsonValue})";
        }
        if (type == typeof(TimeSpan))
        {
            return $"DateIntervalFactory::fromTimeSpanString({jsonValue})";
        }
        if (type.IsPrimitive ||
            type == typeof(string) ||
            type == typeof(Guid) ||
            type == typeof(object) ||
            type == typeof(decimal) ||
            type.IsArray ||
            (type.IsGenericType && (type.GetGenericTypeDefinition() == typeof(List<>) ||
                                    type.GetGenericTypeDefinition() == typeof(Dictionary<,>) ||
                                    type.GetGenericTypeDefinition() == typeof(KeyValuePair<,>))))
        {
            return jsonValue;
        }
        return $"{phpWriter.PhpTypeName(type).Replace("?", "")}::hydrate({jsonValue})";
    }
}