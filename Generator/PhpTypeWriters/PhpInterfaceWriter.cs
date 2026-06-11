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

    public string GetFileName(Type type, string typeName) => $"{typeName}.php";

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace {Constants.Namespace};

""");
        var deprecationComment = type.GetCustomAttribute(typeof(ObsoleteAttribute)) is ObsoleteAttribute { } obsolete ? $"@deprecated {obsolete.Message}" : null;

        writer.WriteCommentBlock(
            phpWriter.XmlDocumentation.GetSummary(type),
            "This is actually an interface.",
            deprecationComment
        );

        writer.WriteLine($"interface {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        writer.Indent--;
        writer.WriteLine("}");
    }
}