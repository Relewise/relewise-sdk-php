namespace Generator.Extensions;

public static class TypeExtensions
{
    public static bool HasBaseTypeAndIsNotAbstract(this Type type) => type.BaseType != typeof(object) && type.BaseType is not null && !type.IsAbstract;
}