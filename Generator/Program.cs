using Generator;
using Relewise.Client;
using Relewise.Client.Requests;
using Relewise.Client.Responses;
using Relewise.Client.Search;
using System.Reflection;

if (args.Length is not 1)
{
    throw new ArgumentException("There needs to be parsed exactly one parameter to this program which is the path to where the class files should be generated.");
}

string basePath = args[0];
if (basePath.EndsWith("/"))
{
    basePath = basePath[..^1];
}

var assembly = Assembly.GetAssembly(typeof(ClientBase));
if (assembly is null)
{
    throw new ArgumentException("Could not load Relewise Client assembly.");
}

var phpWriter = new PhpWriter(assembly, basePath);

phpWriter.WritePhpTypes(assembly
    .GetTypes()
    .Where(type => type.IsSubclassOf(typeof(LicensedRequest))));

phpWriter.WritePhpTypes(assembly
    .GetTypes()
    .Where(type => type.IsSubclassOf(typeof(TimedResponse))));

var phpClientWriter = new PhpClientWriter(phpWriter);

phpClientWriter.GenerateClientClass(typeof(Tracker), new[] { "Track" });
phpClientWriter.GenerateClientClass(typeof(Searcher), new[] { "Search", "Predict", "Batch" });
phpClientWriter.GenerateClientClass(typeof(Recommender), new[] { "Recommend" });

if (phpWriter.MissingTypeDefinitions.Count > 0)
{
    Console.WriteLine("We are missing these types from generation as they were not supported with the current implementation.");
    foreach (var typeDefinition in phpWriter.MissingTypeDefinitions)
    {
        Console.WriteLine($"- {typeDefinition.Name}");
    }
}
else
{
    Console.WriteLine("All types referenced or otherwise traversed were successfully generated.");
}