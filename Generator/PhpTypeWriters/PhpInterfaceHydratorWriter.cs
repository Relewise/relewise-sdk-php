using Generator.Extensions;
using System.CodeDom.Compiler;
using System.Reflection;

namespace Generator.PhpTypeWriters;

internal class PhpInterfaceHydratorWriter : IPhpTypeWriter
{
    private readonly PhpWriter phpWriter;

    public PhpInterfaceHydratorWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public bool CanWrite(Type type) => type.IsInterface;

    public string GetFileName(Type type, string typeName) => $"{phpWriter.HydratorTypeName(type)}.php";

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace {Constants.Namespace};
""");
        writer.WriteLine();

        var deprecationComment = type.GetCustomAttribute(typeof(ObsoleteAttribute)) is ObsoleteAttribute { } obsolete ? $"@deprecated {obsolete.Message}" : null;

        writer.WriteCommentBlock(
            phpWriter.XmlDocumentation.GetSummary(type),
            "Hydrator helper for this interface.",
            deprecationComment
        );

        writer.WriteLine($"class {phpWriter.HydratorTypeName(type)}");
        writer.WriteLine("{");
        writer.Indent++;
        phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, []);
        writer.Indent--;
        writer.WriteLine("}");
    }
}
