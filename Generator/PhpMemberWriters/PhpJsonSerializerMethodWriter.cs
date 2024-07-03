using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpMemberWriters;

public class PhpJsonSerializerMethodWriter
{
    private readonly PhpWriter phpWriter;

    public PhpJsonSerializerMethodWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, Type classType, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        writer.WriteLine("public function jsonSerialize(): mixed");
        writer.WriteLine("{");
        writer.Indent++;

        writer.WriteLine("$result = array();");
        writer.WriteLine($"$result[\"typeDefinition\"] = \"{classType.FullName}, {classType.Assembly.FullName!.Split(",")[0]}\";");
        foreach (var (info, propertyTypeName, propertyName, lowerCaseName) in propertyInformations)
        {
            writer.WriteLine($"if (isset($this->{lowerCaseName}))");
            writer.WriteLine("{");
            writer.Indent++;

            if (propertyTypeName is "DateTime" or "?DateTime")
            {
                writer.WriteLine($"$result[\"{lowerCaseName}\"] = $this->{lowerCaseName}->format(DATE_ATOM);");
            }
            else
            {
                writer.WriteLine($"$result[\"{lowerCaseName}\"] = $this->{lowerCaseName};");
            }

            writer.Indent--;
            writer.WriteLine("}");
        }

        writer.WriteLine("return $result;");

        writer.Indent--;
        writer.WriteLine("}");
    }
}