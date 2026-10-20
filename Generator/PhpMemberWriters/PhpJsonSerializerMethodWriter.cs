using System.CodeDom.Compiler;
using System.Reflection;
using Generator.Extensions;
using Relewise.Client.DataTypes;
using Relewise.Client.DataTypes.Merchandising;
using Relewise.Client.Requests.Recommendations;
using Relewise.Client.Requests.Search;

namespace Generator.PhpMemberWriters;

public class PhpJsonSerializerMethodWriter
{
    private readonly PhpWriter phpWriter;

    public PhpJsonSerializerMethodWriter(PhpWriter phpWriter)
    {
        this.phpWriter = phpWriter;
    }

    // These maps were introduced in API 1.320.0. Keep legacy dictionary serialization unchanged.
    public static bool IsContextDictionary(PropertyInfo property)
    {
        return (property.Name == "ContextValues"
                && (property.DeclaringType == typeof(SearchRequest)
                    || property.DeclaringType == typeof(RecommendationRequest)
                    || property.DeclaringType == typeof(ProductRecommendationRequestCollection)
                    || property.DeclaringType == typeof(ContentRecommendationRequestCollection)
                    || property.DeclaringType == typeof(ProductCategoryRecommendationRequestCollection)
                    || property.DeclaringType == typeof(ContentCategoryRecommendationRequestCollection)))
            || (property.DeclaringType == typeof(ContextValuesMatchCondition) && property.Name == "AcceptedValues");
    }

    public void Write(IndentedTextWriter writer, Type classType, (PropertyInfo info, string propertyTypeName, string propertyName, string lowerCaseName)[] propertyInformations)
    {
        bool hasDates = propertyInformations.Any(p => p.propertyTypeName is "DateTime" or "?DateTime");
        bool preservePublicProperties = classType == typeof(VariantResultDetails)
            || (!hasDates && propertyInformations.Any(p => IsContextDictionary(p.info)));
        if (preservePublicProperties)
        {
            writer.WriteLineNoTabs(string.Empty);
        }
        else
        {
            writer.WriteLine();
        }
        writer.WriteLine("public function jsonSerialize(): mixed");
        writer.WriteLine("{");
        writer.Indent++;

        if (preservePublicProperties)
        {
            // Match default JSON encoding of public properties, including nulls and subclass fields.
            writer.WriteLine("$result = array();");
            writer.WriteLine("foreach ((array) $this as $name => $value)");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine("// Private and protected property names contain a NUL byte when cast to an array.");
            writer.WriteLine("if (!str_contains((string) $name, \"\\0\"))");
            writer.WriteLine("{");
            writer.Indent++;
            writer.WriteLine("$result[$name] = $value;");
            writer.Indent--;
            writer.WriteLine("}");
            writer.Indent--;
            writer.WriteLine("}");
            foreach (var property in propertyInformations.Where(p => IsContextDictionary(p.info)))
            {
                writer.WriteLine($"if (isset($this->{property.lowerCaseName}))");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$result[\"{property.lowerCaseName}\"] = (object) $this->{property.lowerCaseName};");
                writer.Indent--;
                writer.WriteLine("}");
            }
            foreach (var property in propertyInformations.Where(p => p.propertyTypeName is "DateTime" or "?DateTime"))
            {
                writer.WriteLine($"if (isset($this->{property.lowerCaseName}))");
                writer.WriteLine("{");
                writer.Indent++;
                writer.WriteLine($"$result[\"{property.lowerCaseName}\"] = $this->{property.lowerCaseName}->format({DateFormat(property.info)});");
                writer.Indent--;
                writer.WriteLine("}");
            }
            writer.WriteLine("return (object) $result;");
            writer.Indent--;
            writer.WriteLine("}");
            return;
        }

        writer.WriteLine("$result = array();");

        if (classType.HasBaseTypeAndIsNotAbstract())
        {
            writer.WriteLine("$result[\"typeDefinition\"] = $this->typeDefinition;");
        }
        
        foreach (var (info, propertyTypeName, propertyName, lowerCaseName) in propertyInformations)
        {
            writer.WriteLine($"if (isset($this->{lowerCaseName}))");
            writer.WriteLine("{");
            writer.Indent++;

            if (propertyTypeName is "DateTime" or "?DateTime")
            {
                writer.WriteLine($"$result[\"{lowerCaseName}\"] = $this->{lowerCaseName}->format({DateFormat(info)});");
            }
            else if (IsContextDictionary(info))
            {
                writer.WriteLine($"$result[\"{lowerCaseName}\"] = (object) $this->{lowerCaseName};");
            }
            else
            {
                writer.WriteLine($"$result[\"{lowerCaseName}\"] = $this->{lowerCaseName};");
            }

            writer.Indent--;
            writer.WriteLine("}");
        }

        writer.WriteLine("return $result;");

        writer.Indent--;
        writer.WriteLine("}");
    }
    private static string DateFormat(PropertyInfo property) =>
        property.DeclaringType == typeof(VariantResultDetails) && property.Name == nameof(VariantResultDetails.CreatedUtc)
            ? "'Y-m-d\\TH:i:s.vP'"
            : "DATE_ATOM";
}
