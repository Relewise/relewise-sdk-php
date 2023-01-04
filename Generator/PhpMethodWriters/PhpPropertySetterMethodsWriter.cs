using System.CodeDom.Compiler;

namespace Generator.PhpMethodWriters;

public class PhpPropertySetterMethodsWriter
{
    private readonly PhpWriter phpWriter;

    public PhpPropertySetterMethodsWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, (Type type, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        foreach (var (propertyType, propertyTypeName, propertyName, lowerCaseName) in propertyInformations)
        {
            if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>) && propertyType.GenericTypeArguments is [var keyType, var valueType])
            {
                writer.WriteLine($"function with{propertyName}({phpWriter.PhpTypeName(keyType)} $key, {phpWriter.PhpTypeName(valueType)} $value)");
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
                writer.WriteLine($"function with{propertyName}({parameterType} ${lowerCaseName})");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$this->{lowerCaseName} = ${lowerCaseName};");
                writer.WriteLine("return $this;");
                writer.Indent--;
                writer.WriteLine("}");
            }
        }
    }
}