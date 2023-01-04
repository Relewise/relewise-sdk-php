using System.CodeDom.Compiler;

namespace Generator.PhpTypeWriters;

public interface IPhpTypeWriter
{
    public bool CanWrite(Type type);
    public void Write(IndentedTextWriter writer, Type type, string typeName);
}