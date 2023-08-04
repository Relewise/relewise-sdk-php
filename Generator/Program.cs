﻿using Generator;
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

var assembly = Assembly.GetAssembly(typeof(ClientBase)) ?? throw new ArgumentException("Could not load Relewise Client assembly.");

var xmlDocumentation = await XMLDocsFetcher.Get("Relewise.Client", "1.91.0");

Console.WriteLine($"Loaded {xmlDocumentation.Summaries.Count} documentation summaries.");

var phpWriter = new PhpWriter(assembly, basePath, xmlDocumentation);

phpWriter.WritePhpTypes(assembly
    .GetTypes()
    .Where(type => type.IsSubclassOf(typeof(LicensedRequest))));

phpWriter.WritePhpTypes(assembly
    .GetTypes()
    .Where(type => type.IsSubclassOf(typeof(TimedResponse))));

Console.WriteLine($"Successfully used {xmlDocumentation.SuccessfulSummaryInsertions} documentation summaries.");
if (xmlDocumentation.Summaries.Count is not 0)
{
    Console.WriteLine($"These {xmlDocumentation.Summaries.Count} summaries were not used:");
    foreach (var keys in xmlDocumentation.Summaries.Keys)
    {
        Console.WriteLine($"- {keys}");
    }
}

var phpClientWriter = new PhpClientWriter(phpWriter);

phpClientWriter.GenerateClientClass(typeof(Tracker), new[] { "Track" });
phpClientWriter.GenerateClientClass(typeof(Searcher), new[] { "Search", "Predict", "Batch" });
phpClientWriter.GenerateClientClass(typeof(Recommender), new[] { "Recommend" });
phpClientWriter.GenerateClientClass(typeof(SearchAdministrator), new[] { "Delete", "Save", "Load" });

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