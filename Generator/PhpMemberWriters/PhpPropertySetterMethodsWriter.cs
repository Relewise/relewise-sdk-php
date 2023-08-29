using System.CodeDom.Compiler;
using System.Reflection;
using System.Reflection.Metadata;
using Generator.Extensions;

namespace Generator.PhpMemberWriters;

public class PhpPropertySetterMethodsWriter
{
    private readonly PhpWriter phpWriter;

    public PhpPropertySetterMethodsWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type classType, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        foreach (var (info, propertyTypeName, propertyName, lowerCaseName) in propertyInformations)
        {
            var deprecationComment = info.GetCustomAttribute(typeof(ObsoleteAttribute)) is ObsoleteAttribute { } obsolete ? $"@deprecated {obsolete.Message}" : null;
            var propertyType = info.PropertyType;
            if (propertyType.IsGenericType && propertyType.GetGenericTypeDefinition() == typeof(Dictionary<,>) && propertyType.GenericTypeArguments is [var keyType, var valueType])
            {
                var keyTypeName = phpWriter.PhpTypeName(keyType);
                var valueTypeName = phpWriter.PhpTypeName(valueType);
                writer.WriteCommentBlock(
                    phpWriter.XmlDocumentation.GetSummary(classType, propertyName),
                    deprecationComment
                );
                writer.WriteLine($"function addTo{propertyName}({keyTypeName} $key, {valueTypeName} $value)");
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

                writer.WriteCommentBlock(
                    phpWriter.XmlDocumentation.GetSummary(classType, propertyName),
                    deprecationComment,
                    $"@param {phpWriter.DocumentationParameterTypeName(phpWriter.PhpTypeName(info), propertyType)} ${lowerCaseName} associative array."
                );
                writer.WriteLine($"function set{propertyName}FromAssociativeArray(array ${lowerCaseName})");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$this->{lowerCaseName} = ${lowerCaseName};");
                writer.WriteLine("return $this;");
                writer.Indent--;
                writer.WriteLine("}");
            }
            else
            {
                writer.WriteCommentBlock(
                    phpWriter.XmlDocumentation.GetSummary(classType, propertyName),
                    deprecationComment
                );
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
                writer.WriteCommentBlock(
                    phpWriter.XmlDocumentation.GetSummary(classType, propertyName),
                    deprecationComment,
                    $"@param {phpWriter.DocumentationParameterTypeName(propertyTypeName, propertyType)} ${lowerCaseName} new value."
                );
                writer.WriteLine($"function set{propertyName}FromArray(array ${lowerCaseName})");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$this->{lowerCaseName} = ${lowerCaseName};");
                writer.WriteLine("return $this;");
                writer.Indent--;
                writer.WriteLine("}");

                var elementTypeName = phpWriter.PhpTypeName(elementType);

                writer.WriteCommentBlock(
                    phpWriter.XmlDocumentation.GetSummary(classType, propertyName),
                    deprecationComment
                );
                writer.WriteLine($"function addTo{propertyName}({elementTypeName} ${lowerCaseName})");
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