using System.CodeDom.Compiler;

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
        writer.WriteLine("""
<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

""");
        writer.WriteLine("// This is actually an interface.");
        writer.WriteLine($"abstract class {typeName}");
        writer.WriteLine("{");
        writer.Indent++;
        phpWriter.PhpHydrationMethodsWriter.Write(writer, type, typeName, Array.Empty<(Type, string, string, string)>());
        writer.Indent--;
        writer.WriteLine("}");
    }
}