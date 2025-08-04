using System.Reflection;
using Newtonsoft.Json;

namespace Generator.Extensions;

public static class TypeExtensions
{
    private static readonly string[] IgnoredProperties = ["Channel", "SubChannel", "TrackingNumber"];

    public static bool HasBaseTypeAndIsNotAbstract(this Type type) => type.BaseType != typeof(object) && type.BaseType is not null && !type.IsAbstract;

    public static PropertyInfo[] FindGettablePropertyInfos(this Type type) => type
        .GetProperties()
        .Where(info => info.MemberType is MemberTypes.Property
                       && info.GetIndexParameters().Length is 0
                       && info.GetMethod is { IsAbstract: false }
                       && !Attribute.IsDefined(info, typeof(JsonIgnoreAttribute))
                       && info.GetAccessors(false).All(ax => !ax.IsAbstract && ax.IsPublic)
                       && info.Name != "Custom" // It is a special requirement that we should ignore the property Custom from all classes.
                       && !(Attribute.IsDefined(info, typeof(ObsoleteAttribute)) && IgnoredProperties.Contains(info.Name)) // Certain properties should not be generated if they are obsolete as they might have been obsoleted before the PHP SDK was first released or because they were added and obsoleted in between releases of the PHP SDK.
        )
        .ToArray();

    public static PropertyInfo[] FindSettablePropertyInfos(this Type type) => type
        .FindGettablePropertyInfos()
        .Where(info => info.SetMethod is { IsAbstract: false })
        .ToArray();

    public static PropertyInfo[] FindOwnedPropertyInfos(this Type type) => type
        .FindSettablePropertyInfos()
        .Where(info => info.DeclaringType == type
                       && info.DeclaringType?.IsAbstract == type.IsAbstract)
        .ToArray();
}