using System.CodeDom.Compiler;

namespace Generator.PhpTypeWriters;

public interface IPhpTypeWriter
{
    public bool CanWrite(Type type);
    public string GetFileName(Type type, string typeName);
    public void Write(IndentedTextWriter writer, Type type, string typeName);
}