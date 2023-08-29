using AngleSharp;
using System.IO.Compression;
using System.Web;

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
                    foreach (var seeReference in child.Children.Where(c => c.TagName == "SEE"))
                    {
                        seeReference.OuterHtml = seeReference.GetAttribute("cref")?.Split(".").Last() ?? string.Empty;
                    }
                    
                    result.Summaries.TryAdd(member.GetAttribute("name")!, HttpUtility.HtmlDecode(child.InnerHtml.Replace("\n", "").Trim()));
                }
                else if (child.TagName is "PARAM" && child.NextSibling?.TextContent is { Length: > 0 } text)
                {
                    foreach (var seeReference in child.Children.Where(c => c.TagName == "SEE"))
                    {
                        seeReference.OuterHtml = seeReference.GetAttribute("cref")?.Split(".").Last() ?? string.Empty;
                    }

                    result.Params.TryAdd($"{child.GetAttribute("name")}-{member.GetAttribute("name")!}", HttpUtility.HtmlDecode(text.Replace("\n", "").Trim()));
                }
            }
        }

        return result;
    }


}