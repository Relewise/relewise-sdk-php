using System.CodeDom.Compiler;
using System.Globalization;
using System.Reflection;

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
        foreach (var (_, propertyTypeName, propertyName, lowerCaseName) in ownedProperties)
        {
            if (phpWriter.XmlDocumentation.TryGetSummary(classType, propertyName, out string summary))
            {
                writer.WriteLine(summary);
            }
            writer.WriteLine($"public {propertyTypeName} ${lowerCaseName};");
        }
    }
}