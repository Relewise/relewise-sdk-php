using AngleSharp;
using System.IO.Compression;
using System.Web;
using AngleSharp.Dom;

namespace Generator;

public static class XMLDocsFetcher
{
    public static async Task<XmlDocumentation> Get(string package, string version)
    {
        var httpClient = new HttpClient();

        var stream = await httpClient.GetStreamAsync($"https://www.nuget.org/api/v2/package/{package}/{version}");

        using var archive = new ZipArchive(stream, ZipArchiveMode.Read, true);

        if (archive.GetEntry("lib/netstandard2.0/Relewise.Client.xml") is not { } xmlFile)
        {
            return new();
        }

        await using var xmlDocsStream = xmlFile.Open();
        using var reader = new StreamReader(xmlDocsStream);
        var content = await reader.ReadToEndAsync();

        XmlDocumentation result = new ();

        IBrowsingContext context = BrowsingContext.New();
        var document = await context.OpenAsync(req => req.Content(content.Replace("/>", "></SEE>")));
        foreach (var seeReference in document.QuerySelectorAll("see"))
        {
            seeReference.OuterHtml = seeReference.GetAttribute("cref")?.Split(".").Last() ?? seeReference.GetAttribute("langword")?.Split(".").Last() ?? string.Empty;
        }
        
        foreach (var member in document.GetElementsByTagName("doc")[0].Children[1].Children)
        {
            foreach (var child in member.Children)
            {
                if (child.TagName is "SUMMARY" && child.InnerHtml.Trim().Length > 0)
                {
                    foreach (var summaryWrapper in child.Children.Where(c => c.TagName == "SUMMARY"))
                    {
                        summaryWrapper.OuterHtml = summaryWrapper.InnerHtml.Trim();
                    }
                    foreach (var paraWrapper in child.Children.Where(c => c.TagName == "PARA"))
                    {
                        paraWrapper.OuterHtml = paraWrapper.InnerHtml.Trim();
                    }
                    foreach (var cWrapper in child.Children.Where(c => c.TagName == "C"))
                    {
                        cWrapper.OuterHtml = cWrapper.InnerHtml.Trim();
                    }
                    foreach (var exampleWrapper in child.Children.Where(c => c.TagName == "EXAMPLE"))
                    {
                        exampleWrapper.OuterHtml = exampleWrapper.InnerHtml.Trim();
                    }

                    result.Summaries.TryAdd(member.GetAttribute("name")!, HttpUtility.HtmlDecode(JoinInOneLine(child.InnerHtml)));
                }
                else if (child.TagName is "PARAM" && child.NextSibling?.TextContent is { Length: > 0 } text)
                {

                    result.Params.TryAdd($"{child.GetAttribute("name")}-{member.GetAttribute("name")!}", HttpUtility.HtmlDecode(JoinInOneLine(text)));
                }
            }
        }

        return result;
    }

    private static string JoinInOneLine(string text) => string.Join(" ", text.Split("\n").Select(line => line.Trim())).Trim();
}