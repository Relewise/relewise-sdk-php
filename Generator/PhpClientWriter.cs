using Generator.Extensions;
using Relewise.Client.Requests;
using System;
using System.CodeDom.Compiler;

namespace Generator;

public class PhpClientWriter
{
    private readonly PhpWriter phpWriter;

    public PhpClientWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    public void GenerateClientClass(Type clientType, string[] clientMethodNames)
    {
        using var streamWriter = File.CreateText($"{phpWriter.BasePath}/{clientType.Name}.php");
        using var writer = new IndentedTextWriter(streamWriter);

        int timeout = 5;
        if (clientType.GetConstructor(new[] { typeof(Guid), typeof(string), typeof(int) }) is {} constructor
            && constructor.GetParameters().Last() is { HasDefaultValue: true } requestTimeoutInSecondsParameter)
        {
            timeout = (int)requestTimeoutInSecondsParameter.DefaultValue!;
        }

        var clientMethods = clientType
            .GetMethods()
            .Where(info => info.DeclaringType == clientType
                           && clientMethodNames.Contains(info.Name)
                           && info.GetParameters().Length is 1
                           && !info.GetParameters().First().ParameterType.IsGenericType
                           && !info.GetParameters().First().ParameterType.IsArray
                           && info.GetParameters().First().ParameterType.IsClass
                           && info.GetParameters().First().ParameterType.IsAssignableTo(typeof(LicensedRequest))
            )
            .SelectMany(info => info.GetParameters().First().ParameterType.IsAbstract
                ? phpWriter.Assembly
                    .GetTypes()
                    .Where(derivingType => !derivingType.IsGenericType && derivingType.IsAssignableTo(info.GetParameters().First().ParameterType))
                    .Select(derivedType => (
                        methodName: phpWriter.PhpTypeName(derivedType).ToCamelCase(),
                        parameterTypeName: phpWriter.PhpTypeName(derivedType),
                        parameterClrType: derivedType,
                        parameterName: info.GetParameters().First().Name!,
                        returnType: info.ReturnType))
                : new[]
                {
                (
                    methodName: phpWriter.PhpTypeName(info.GetParameters().First().ParameterType).ToCamelCase(),
                    parameterTypeName: phpWriter.PhpTypeName(info.GetParameters().First().ParameterType),
                    parameterClrType: info.GetParameters().First().ParameterType,
                    parameterName: info.GetParameters().First().Name!,
                    returnType: info.ReturnType)
                })
            .Select(method =>
            {
                var isBatchCollectionRequest = method.parameterClrType.Name.EndsWith("RequestCollection", StringComparison.Ordinal);
                return (
                    methodName: method.methodName,
                    parameterTypeName: method.parameterTypeName,
                    parameterClrType: method.parameterClrType,
                    parameterName: method.parameterName,
                    returnType: isBatchCollectionRequest ? typeof(void) : method.returnType,
                    isBatchCollectionRequest: isBatchCollectionRequest);
            })
            .ToArray();

        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
""");

        foreach (var method in clientMethods.DistinctBy(method => method.parameterTypeName))
        {
            writer.WriteLine($"use {Constants.Namespace}\\{method.parameterTypeName};");
        }
        foreach (var method in clientMethods.DistinctBy(method => method.returnType).Where(method => method.returnType != typeof(void)))
        {
            writer.WriteLine($"use {Constants.Namespace}\\{phpWriter.PhpTypeName(method.returnType)};");
        }
        writer.WriteLine("");

        writer.WriteLine($"class {clientType.Name} extends RelewiseClient");
        writer.WriteLine("{");
        writer.Indent++;

        writer.WriteLine($"public function __construct(private string $datasetId, private string $apiKey, private int $timeout = {timeout})");
        writer.WriteLine("{");
        writer.Indent++;
        writer.WriteLine("parent::__construct($datasetId, $apiKey, $timeout);");
        writer.Indent--;
        writer.WriteLine("}");

        foreach (var method in clientMethods.DistinctBy(method => method.parameterTypeName))
        {
            var methodName = method.methodName.EndsWith("Request") ? method.methodName[..^7].ToCamelCase() : method.methodName.EndsWith("RequestCollection") ? $"batch{method.methodName[..^17]}" : method.methodName.ToCamelCase();

            writer.WriteLine();
            writer.WriteLine($"public function {methodName}({method.parameterTypeName} ${method.parameterName}){(method.returnType != typeof(void) ? $" : ?{phpWriter.PhpTypeName(method.returnType)}" : "")}");
            writer.WriteLine("{");
            writer.Indent++;
            var collectionProperty = method.parameterClrType.GetProperty("Requests")?.Name
                ?? method.parameterClrType.GetProperty("Items")?.Name;
            var phpCollectionProperty = collectionProperty?.ToCamelCase();

            if (phpCollectionProperty is not null)
            {
                var isBatchCollectionRequest = method.isBatchCollectionRequest;

                if (method.returnType == typeof(void) || isBatchCollectionRequest)
                {
                    writer.WriteLine($"if (!isset(${method.parameterName}->{phpCollectionProperty}) || count(${method.parameterName}->{phpCollectionProperty}) === 0)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine(isBatchCollectionRequest && method.returnType != typeof(void) ? "return Null;" : "return;");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine($"$chunks = $this->createBatches(${method.parameterName}->{phpCollectionProperty});");
                    writer.WriteLine("foreach ($chunks as $chunk)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine($"$chunkedRequest = clone ${method.parameterName};");
                    writer.WriteLine($"$chunkedRequest->{phpCollectionProperty} = $chunk;");
                    writer.WriteLine($"$this->requestAndValidate(\"{method.parameterTypeName}\", $chunkedRequest);");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine(isBatchCollectionRequest && method.returnType != typeof(void) ? "return Null;" : "return;");
                }
                else
                {
                    var responseCollectionProperty = method.returnType.GetProperty("Responses")?.Name?.ToCamelCase();
                    writer.WriteLine($"if (!isset(${method.parameterName}->{phpCollectionProperty}) || count(${method.parameterName}->{phpCollectionProperty}) === 0)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine("return Null;");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine($"$chunks = $this->createBatches(${method.parameterName}->{phpCollectionProperty});");
                    writer.WriteLine("$aggregatedResponse = Null;");
                    writer.WriteLine("foreach ($chunks as $chunk)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine($"$chunkedRequest = clone ${method.parameterName};");
                    writer.WriteLine($"$chunkedRequest->{phpCollectionProperty} = $chunk;");
                    writer.WriteLine($"$chunkResponse = $this->requestAndValidate(\"{method.parameterTypeName}\", $chunkedRequest);");
                    writer.WriteLine("if ($chunkResponse == Null)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine("continue;");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine($"$hydratedChunkResponse = {phpWriter.PhpTypeName(method.returnType)}::hydrate($chunkResponse);");
                    writer.WriteLine("if ($aggregatedResponse == Null)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine("$aggregatedResponse = $hydratedChunkResponse;");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine("else");
                    writer.WriteLine("{");
                    writer.Indent++;
                    if (responseCollectionProperty is not null)
                    {
                        writer.WriteLine($"if (isset($hydratedChunkResponse->{responseCollectionProperty}))");
                        writer.WriteLine("{");
                        writer.Indent++;
                        writer.WriteLine($"if (!isset($aggregatedResponse->{responseCollectionProperty}))");
                        writer.WriteLine("{");
                        writer.Indent++;
                        writer.WriteLine($"$aggregatedResponse->{responseCollectionProperty} = array();");
                        writer.Indent--;
                        writer.WriteLine("}");
                        writer.WriteLine($"$aggregatedResponse->{responseCollectionProperty} = array_merge(");
                        writer.Indent++;
                        writer.WriteLine($"$aggregatedResponse->{responseCollectionProperty},");
                        writer.WriteLine($"$hydratedChunkResponse->{responseCollectionProperty}");
                        writer.Indent--;
                        writer.WriteLine(");");
                        writer.Indent--;
                        writer.WriteLine("}");
                    }
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine("return $aggregatedResponse;");
                }
            }
            else
            {
                if (method.returnType == typeof(void))
                {
                    writer.WriteLine($"return $this->requestAndValidate(\"{method.parameterTypeName}\", ${method.parameterName});");
                }
                else
                {
                    writer.WriteLine($"$response = $this->requestAndValidate(\"{method.parameterTypeName}\", ${method.parameterName});");
                    writer.WriteLine("if ($response == Null)");
                    writer.WriteLine("{");
                    writer.Indent++;
                    writer.WriteLine("return Null;");
                    writer.Indent--;
                    writer.WriteLine("}");
                    writer.WriteLine($"return {phpWriter.PhpTypeName(method.returnType)}::hydrate($response);");
                }
            }
            writer.Indent--;
            writer.WriteLine("}");
        }
        writer.Indent--;
        writer.WriteLine("}");
    }
}