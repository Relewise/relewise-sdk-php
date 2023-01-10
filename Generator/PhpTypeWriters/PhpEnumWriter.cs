﻿using System.CodeDom.Compiler;

namespace Generator.PhpTypeWriters;

internal class PhpEnumWriter : IPhpTypeWriter
{
    private readonly PhpWriter phpWriter;

    public PhpEnumWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public bool CanWrite(Type type) => type.IsEnum;

    public void Write(IndentedTextWriter writer, Type type, string typeName)
    {
        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace {Constants.Namespace};

use DateTime;

""");
        writer.WriteLine($"enum {typeName} : string");
        writer.WriteLine("{");
        writer.Indent++;
        foreach (var enumMember in type.GetMembers().Where(propertyInfo => propertyInfo.DeclaringType is { IsEnum: true } && propertyInfo.Name is not "__value" and not "value__"))
        {
            writer.WriteLine($"case {enumMember.Name} = '{enumMember.Name}';");
        }
        writer.Indent--;
        writer.WriteLine("}");
    }
}