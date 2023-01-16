using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpMemberWriters;

public class PhpPropertySetterMethodsWriter
{
    private readonly PhpWriter phpWriter;

    public PhpPropertySetterMethodsWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        foreach (var (info, propertyTypeName, propertyName, lowerCaseName) in propertyInformations)
        {
            var propertyType = info.PropertyType;
            if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>) && propertyType.GenericTypeArguments is [var keyType, var valueType])
            {
                writer.WriteLine($"function addTo{propertyName}({phpWriter.PhpTypeName(keyType)} $key, {phpWriter.PhpTypeName(valueType)} $value)");
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
                var parameterType = phpWriter.BetterTypedParameterTypeName(propertyTypeName, propertyType);
                writer.WriteLine($"function set{propertyName}({parameterType} ${lowerCaseName})");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$this->{lowerCaseName} = ${lowerCaseName};");
                writer.WriteLine("return $this;");
                writer.Indent--;
                writer.WriteLine("}");
            }

            Type? elementType = null;
            if (propertyType.IsArray)
            {
                elementType = propertyType.GetElementType();
            }
            else if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(List<>))
            {
                elementType = propertyType.GenericTypeArguments[0];
            }
            if (elementType is not null)
            {
                writer.WriteLine($"function addTo{propertyName}({phpWriter.PhpTypeName(elementType)} ${lowerCaseName})");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"if (!isset($this->{lowerCaseName}))");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$this->{lowerCaseName} = array();");
                writer.Indent--;
                writer.WriteLine("}");
                writer.WriteLine($"array_push($this->{lowerCaseName}, ${lowerCaseName});");
                writer.WriteLine("return $this;");
                writer.Indent--;
                writer.WriteLine("}");
            }
        }
    }
}