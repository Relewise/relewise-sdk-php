using System.CodeDom.Compiler;
using System.Globalization;
using System.Reflection;

namespace Generator.PhpMemberWriters;

public class PhpStaticReadonlyPropertiesWriter
{
    private readonly PhpWriter phpWriter;

    public PhpStaticReadonlyPropertiesWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void Write(IndentedTextWriter writer, (PropertyInfo type, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformation)
    {
        foreach (var (info, _, _, lowerCaseName) in propertyInformation)
        {
            var getAccessorResult = info.GetAccessors()[0].Invoke(null, BindingFlags.GetProperty, null, null, CultureInfo.InvariantCulture);
            if (getAccessorResult != null)
            {
                throw new NotImplementedException("We have not implemented support for static readonly properties that return other values than 'null'.");
            }
            writer.WriteLine($"const {lowerCaseName.ToUpper()} = Null;");
            writer.WriteLine();
        }
    }
}