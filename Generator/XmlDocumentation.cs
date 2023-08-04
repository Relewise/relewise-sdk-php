namespace Generator;

public class XmlDocumentation
{
    public Dictionary<string, string> Summaries { get; set; } = new Dictionary<string, string>();
    public int SuccessfulSummaryInsertions { get; set; }

    public bool TryGetSummary(Type type, out string summary) => TryGetSummary(type, "", out summary);
    public bool TryGetSummary(Type type, string memberName, out string summary)
    {
        var xmlTypeName = type.Name;
        if (type.DeclaringType is not null)
        {
            xmlTypeName = type.DeclaringType.Name + "." + type.Name;
        }

        return TryGetSummary(type.Namespace, string.IsNullOrEmpty(memberName) ? xmlTypeName : xmlTypeName + "." + memberName, out summary);
    }

    public bool TryGetSummary(string namespaceName, string typeName, out string summary) => TryGetSummary(namespaceName + "." + typeName, out summary);

    public bool TryGetSummary(string key, out string summary)
    {
        if (Summaries.FirstOrDefault(kvp => kvp.Key.ToLower().EndsWith(key.ToLower())) is
            { Key: {} matchingKey, Value: { Length: > 0 } matchingSummary })
        {
            summary = matchingSummary;
            Summaries.Remove(matchingKey);
            SuccessfulSummaryInsertions++;
            return true;
        }

        summary = string.Empty;
        return false;
    }
}