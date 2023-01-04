using Generator.Extensions;
using Relewise.Client.Requests;
using System.CodeDom.Compiler;
using System.Reflection;

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
                        parameterType: phpWriter.PhpTypeName(derivedType),
                        parameterName: info.GetParameters().First().Name!,
                        returnType: info.ReturnType))
                : new[]
                {
                (
                    methodName: phpWriter.PhpTypeName(info.GetParameters().First().ParameterType).ToCamelCase(),
                    parameterType: phpWriter.PhpTypeName(info.GetParameters().First().ParameterType),
                    parameterName: info.GetParameters().First().Name!,
                    returnType: info.ReturnType)
                })
            .ToArray();

        writer.WriteLine($"""
<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Response;
""");

        foreach (var method in clientMethods.DistinctBy(method => method.parameterType))
        {
            writer.WriteLine($"use Relewise\\Models\\DTO\\{method.parameterType};");
        }
        foreach (var method in clientMethods.DistinctBy(method => method.returnType).Where(method => method.returnType != typeof(void)))
        {
            writer.WriteLine($"use Relewise\\Models\\DTO\\{phpWriter.PhpTypeName(method.returnType)};");
        }
        writer.WriteLine($"");

        writer.WriteLine($"class {clientType.Name} extends RelewiseClient");
        writer.WriteLine("{");
        writer.Indent++;
        foreach (var method in clientMethods.DistinctBy(method => method.parameterType))
        {
            var methodName = method.methodName.EndsWith("Request") ? method.methodName[..^7].ToCamelCase() : method.methodName.EndsWith("RequestCollection") ? $"batch{method.methodName[..^17]}" : method.methodName.ToCamelCase();
            writer.WriteLine($"public function {methodName}({method.parameterType} ${method.parameterName}){(method.returnType != typeof(void) ? $" : ?{phpWriter.PhpTypeName(method.returnType)}" : "")}");
            writer.WriteLine("{");
            writer.Indent++;
            if (method.returnType == typeof(void))
            {
                writer.WriteLine($"return $this->requestAndValidate(\"{method.parameterType}\", ${method.parameterName});");
            }
            else
            {
                writer.WriteLine($"$response = $this->requestAndValidate(\"{method.parameterType}\", ${method.parameterName});");
                writer.WriteLine("if ($response == Null)");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine("return Null;");
                writer.Indent--;
                writer.WriteLine("}");
                writer.WriteLine($"return {phpWriter.PhpTypeName(method.returnType)}::hydrate($response);");
            }
            writer.Indent--;
            writer.WriteLine("}");
        }
        writer.Indent--;
        writer.WriteLine("}");
    }
}