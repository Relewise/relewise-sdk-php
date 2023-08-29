using System.CodeDom.Compiler;

namespace Generator.Extensions;

public static class IndentedTextWriterExtensions
{
    public static void WriteCommentBlock(this IndentedTextWriter writer, params string?[] comments)
    {
        comments = comments.Where(c => c is not null).ToArray();
        if (comments.Length is 0) return;
        if (comments.Length == 1)
        {
            writer.WriteLine($"/** {comments[0]} */");
        }
        else
        {
            writer.WriteLine("/**");
            foreach (var comment in comments)
            {
                writer.WriteLine($" * {comment}");
            }
            writer.WriteLine(" */");
        }
    }
}