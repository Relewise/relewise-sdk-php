using System.CodeDom.Compiler;
using System.Reflection;
using Generator.Extensions;

namespace Generator.PhpMemberWriters;

public class PhpHydrationMethodsWriter
{
    private readonly PhpWriter phpWriter;

    public PhpHydrationMethodsWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type type, string typeName, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations, bool internalContext = false)
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
                writer.WriteLine($"return {ModelTypeReference(derivedType, internalContext)}::hydrate($arr);");
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
                writer.WriteLine($"$result = {ModelTypeReference(abstractBase, internalContext)}::hydrateBase($result, $arr);");
            }
            foreach (var (info, _, _, lowerCaseName) in propertyInformations)
            {
                WriteHydrationSetter(writer, info.PropertyType, lowerCaseName, internalContext);
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
                writer.WriteLine($"$result = {ModelTypeReference(abstractBase, internalContext)}::hydrateBase(new {typeName}(), $arr);");
            }
            // In this case the base type won't expose a hydrate method we can use
            // We need to handle the base type's props manually
            else if (type.BaseType != typeof(ValueType)
                    && type.BaseType != typeof(object)
                    && type is { IsAbstract: false, BaseType.IsAbstract: false })
            {
                // If the base class has a base class we need to reuse that class' hydrateBase method
                writer.WriteLine(type.BaseType.BaseType != null &&
                                 type.BaseType.BaseType != typeof(object)
                    ? $"$result = {ModelTypeReference(type.BaseType.BaseType, internalContext)}::hydrateBase(new {typeName}(), $arr);"
                    : $"$result = new {typeName}();");

                foreach (PropertyInfo props in type.BaseType.FindOwnedPropertyInfos())
                { 
                    WriteHydrationSetter(writer, props.PropertyType, props.Name.ToCamelCase(), internalContext);
                }
            }
            else
            {
                writer.WriteLine($"$result = new {typeName}();");
            }

            foreach (var (info, _, _, lowerCaseName) in propertyInformations)
            {
                WriteHydrationSetter(writer, info.PropertyType, lowerCaseName, internalContext);
            }
            writer.WriteLine($"return $result;");
            writer.Indent--;
            writer.WriteLine("}");
        }
    }

    private void WriteHydrationSetter(IndentedTextWriter writer, Type propertyType, string lowerCaseName, bool internalContext)
    {
        writer.WriteLine($"if (array_key_exists(\"{lowerCaseName}\", $arr))");
        writer.WriteLine("{");
        writer.Indent++;
        if (propertyType.IsArray && propertyType.GetElementType() is { } elementType)
        {
            WriteArrayLikeHydrationSetter(writer, elementType, lowerCaseName, internalContext);
        }
        else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>))
        {
            WriteArrayLikeHydrationSetter(writer, propertyType.GenericTypeArguments.Single(), lowerCaseName, internalContext);
        }
        else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>))
        {
            WriteDictionaryHydrationSetter(writer, propertyType.GenericTypeArguments[0], propertyType.GenericTypeArguments[1], lowerCaseName, internalContext);
        }
        else
        {
            writer.WriteLine($"$result->{lowerCaseName} = {HydrationExpression(propertyType, $"$arr[\"{lowerCaseName}\"]", internalContext)};");
        }
        writer.Indent--;
        writer.WriteLine("}");
    }

    private void WriteArrayLikeHydrationSetter(IndentedTextWriter writer, Type elementType, string lowerCaseName, bool internalContext)
    {
        writer.WriteLine($"$result->{lowerCaseName} = array();");
        writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as &$value)");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"array_push($result->{lowerCaseName}, {HydrationExpression(elementType, "$value", internalContext)});");
        writer.Indent--;
        writer.WriteLine("}");
    }

    private void WriteDictionaryHydrationSetter(IndentedTextWriter writer, Type keyType, Type valueType, string lowerCaseName, bool internalContext)
    {
        writer.WriteLine($"$result->{lowerCaseName} = array();");
        writer.WriteLine($"foreach($arr[\"{lowerCaseName}\"] as $key => $value)");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine($"$result->{lowerCaseName}[{HydrationExpression(keyType, "$key", internalContext)}] = {HydrationExpression(valueType, "$value", internalContext)};");
        writer.Indent--;
        writer.WriteLine("}");
    }

    private string HydrationExpression(Type type, string jsonValue, bool internalContext)
    {
        if (Nullable.GetUnderlyingType(type) is { } underlyingType)
        {
            return HydrationExpression(underlyingType, jsonValue, internalContext);
        }
        if (type.IsEnum)
        {
            return $"{ModelTypeReference(type, internalContext)}::from({jsonValue})";
        }
        if (type == typeof(DateTimeOffset) || type == typeof(DateTime))
        {
            return $"new DateTime({jsonValue})";
        }
        if (type == typeof(TimeSpan))
        {
            return $"DateIntervalFactory::fromTimeSpanString({jsonValue})";
        }
        if (type.IsInterface)
        {
            return $"{InternalTypeReference(type, internalContext)}::hydrate({jsonValue})";
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
        return $"{ModelTypeReference(type, internalContext)}::hydrate({jsonValue})";
    }

    private string ModelTypeReference(Type type, bool internalContext)
    {
        var typeName = phpWriter.PhpTypeName(type).Replace("?", string.Empty);
        return internalContext ? $"Models\\{typeName}" : typeName;
    }

    private string InternalTypeReference(Type type, bool internalContext)
    {
        var typeName = phpWriter.HydratorTypeName(type);
        return internalContext ? typeName : $"Internal\\{typeName}";
    }
}
