using AngleSharp;
using System.IO.Compression;

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

        XmlDocumentation result = new ();

        IBrowsingContext context = BrowsingContext.New();
        var document = await context.OpenAsync(req => req.Content(xmlDocsStream));
        foreach (var member in document.GetElementsByTagName("doc")[0].Children[1].Children)
        {
            if (member.Children.FirstOrDefault(c => c.TagName is "SUMMARY") is { } summary)
            {
                result.Summaries.Add(member.GetAttribute("name")!, $"/** {summary.InnerHtml.Replace("\n", "").Trim()} */");
            }
        }

        return result;
    }
}