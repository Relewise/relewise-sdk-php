using Generator.Extensions;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpTypeWriters;

internal class PhpInterfaceWriter : IPhpTypeWriter
{
    private readonly PhpWriter phpWriter;

    public PhpInterfaceWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public bool CanWrite(Type type) => type.IsInterface;

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace {Constants.Namespace};

use DateTime;

""");
        var deprecationComment = type.GetCustomAttribute(typeof(ObsoleteAttribute)) is ObsoleteAttribute { } obsolete ? $"@deprecated {obsolete.Message}" : null;

        writer.WriteCommentBlock(
            phpWriter.XmlDocumentation.GetSummary(type),
            "This is actually an interface.",
            deprecationComment
        );

        writer.WriteLine($"abstract class {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, Array.Empty<(PropertyInfo, string, string, string)>());
        writer.Indent--;
        writer.WriteLine("}");
    }
}