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

    public void Write(IndentedTextWriter writer, (PropertyInfo type, string propertyTypeName, string propertyName, string lowerCaseName)[] ownedProperties)
    {
        foreach (var (_, propertyTypeName, _, lowerCaseName) in ownedProperties)
        {
            writer.WriteLine($"public {propertyTypeName} ${lowerCaseName};");
        }
    }
}