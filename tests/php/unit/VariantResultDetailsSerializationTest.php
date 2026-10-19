<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Models\VariantResultDetails;

class VariantResultDetailsSerializationTest extends TestCase
{
    public function testUninitializedVariantKeepsReleasedEmptyObjectShape(): void
    {
        self::assertSame('{}', json_encode(new VariantResultDetails(), JSON_THROW_ON_ERROR));
    }

    public function testReleasedFieldsKeepTheirValuesAndExplicitNulls(): void
    {
        $variant = VariantResultDetails::create('v1')
            ->setSpecificationFromAssociativeArray(['Size' => 'M'])
            ->setAssortments(1, 2)
            ->setDataFromAssociativeArray([])
            ->setDisabled(false)
            ->setUserEngagement(null);

        // Same JSON as release 2.19.1, which used PHP's default public-property encoding.
        self::assertSame(
            '{"variantId":"v1","specification":{"Size":"M"},"assortments":[1,2],"data":[],"disabled":false,"userEngagement":null}',
            json_encode($variant, JSON_THROW_ON_ERROR)
        );
    }

    public function testPublicExtensionsRemainVisibleAndNonpublicFieldsRemainHidden(): void
    {
        $variant = new ExtendedVariantResultDetails();
        $variant->variantId = 'v1';
        $variant->userEngagement = null;
        $variant->extra = 'dynamic';
        $expected = json_encode((object) get_object_vars($variant), JSON_THROW_ON_ERROR);

        self::assertSame($expected, json_encode($variant, JSON_THROW_ON_ERROR));
        $json = json_decode(json_encode($variant, JSON_THROW_ON_ERROR));
        self::assertSame('public', $json->publicField);
        self::assertSame('dynamic', $json->extra);
        self::assertTrue(property_exists($json, 'userEngagement'));
        self::assertNull($json->userEngagement);
        self::assertFalse(property_exists($json, 'protectedField'));
        self::assertFalse(property_exists($json, 'privateField'));
        self::assertFalse(property_exists($json, 'uninitializedField'));
    }

    public function testNewDatesAreFormattedWithoutMutatingPublicProperties(): void
    {
        $created = new \DateTime('2026-10-19T12:34:56.789+02:00');
        $purchased = new \DateTime('2026-10-19T12:35:00+02:00');
        $variant = VariantResultDetails::create('v1')
            ->setCreatedUtc($created)
            ->setLastPurchasedUtc($purchased)
            ->setLastViewedUtc(null);

        $json = json_decode(json_encode($variant, JSON_THROW_ON_ERROR));
        self::assertSame('2026-10-19T12:34:56.789+02:00', $json->createdUtc);
        self::assertSame('2026-10-19T12:35:00+02:00', $json->lastPurchasedUtc);
        self::assertTrue(property_exists($json, 'lastViewedUtc'));
        self::assertNull($json->lastViewedUtc);
        self::assertSame($created, $variant->createdUtc);
        self::assertSame($purchased, $variant->lastPurchasedUtc);
    }
}

#[\AllowDynamicProperties]
class ExtendedVariantResultDetails extends VariantResultDetails
{
    public string $publicField = 'public';
    public string $uninitializedField;
    protected string $protectedField = 'protected';
    private string $privateField = 'private';
}
