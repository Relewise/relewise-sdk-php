using System.CodeDom.Compiler;
using System.Globalization;
using System.Reflection;
using Generator.Extensions;

namespace Generator.PhpMemberWriters;

public class PhpSettablePropertiesWriter
{
    private readonly PhpWriter phpWriter;

    public PhpSettablePropertiesWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type classType, (PropertyInfo type, string propertyTypeName, string propertyName, string lowerCaseName)[] ownedProperties)
    {
        foreach (var (propertyInfo, propertyTypeName, propertyName, lowerCaseName) in ownedProperties)
        {
            writer.WriteCommentBlock(
                phpWriter.XmlDocumentation.GetSummary(classType, propertyName),
                propertyInfo.GetCustomAttribute(typeof(ObsoleteAttribute)) is ObsoleteAttribute { } obsolete ? $"@deprecated {obsolete.Message}" : null
                );

            writer.WriteLine($"public {propertyTypeName} ${lowerCaseName};");
            writer.WriteLine();
        }
    }
}