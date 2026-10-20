<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Relewise\Models\ContentRecommendationRequestCollection;
use Relewise\Models\ProductRecommendationRequestCollection;
use Relewise\Models\ContentCategoryRecommendationRequestCollection;
use Relewise\Models\ProductCategoryRecommendationRequestCollection;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\PopularProductsRequest;
use Relewise\Models\SearchRequestCollection;
use Relewise\Models\ContextValuesMatchCondition;
use Relewise\Models\VariantResultDetails;
use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\Response;
use Relewise\RelewiseClient;
use Relewise\Searcher;

class ContextSerializationTest extends TestCase
{
    public static function requestMaps(): iterable
    {
        foreach ([ProductSearchRequest::class, PopularProductsRequest::class, SearchRequestCollection::class,
                  ProductRecommendationRequestCollection::class, ContentRecommendationRequestCollection::class,
                  ProductCategoryRecommendationRequestCollection::class, ContentCategoryRecommendationRequestCollection::class] as $class) {
            foreach ([[], ['0' => 'Mobile', '1' => 'Tablet'], ['DeviceType' => 'Mobile']] as $index => $values) {
                yield $class . '-' . $index => [$class, $values];
            }
        }
    }

    #[DataProvider('requestMaps')]
    public function testContextMapsAreObjectsWithoutChangingPhpArrays(string $class, array $values): void
    {
        $request = (new $class())->setContextValuesFromAssociativeArray($values);
        $json = json_decode(json_encode($request, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR);
        self::assertInstanceOf(\stdClass::class, $json->contextValues);
        self::assertSame($values, (array) $json->contextValues);
        self::assertSame($values, $request->contextValues);
        self::assertSame($request->typeDefinition, $json->typeDefinition);
    }

    public function testAcceptedValuesOuterMapIsObjectAndInnerValuesAreLists(): void
    {
        $condition = ContextValuesMatchCondition::create()->setAcceptedValuesFromAssociativeArray([]);
        $empty = json_decode(json_encode($condition, JSON_THROW_ON_ERROR));
        self::assertInstanceOf(\stdClass::class, $empty->acceptedValues);
        self::assertSame([], (array) $empty->acceptedValues);
        $condition->addToAcceptedValues('0', ['Mobile', 'Tablet']);
        $json = json_decode(json_encode($condition, JSON_THROW_ON_ERROR));
        self::assertInstanceOf(\stdClass::class, $json->acceptedValues);
        self::assertSame(['Mobile', 'Tablet'], $json->acceptedValues->{'0'});
    }

    public function testNewSerializerPreservesPublicFieldsAndNullsWithoutExposingNonpublicFields(): void
    {
        $request = new ExtendedContextSearchRequest();
        $request->term = null;
        $request->skip = 2;
        $request->take = 5;
        $request->contextValues = null;
        $request->extra = 'dynamic';
        $expected = json_encode((object) get_object_vars($request), JSON_THROW_ON_ERROR);
        self::assertSame($expected, json_encode($request, JSON_THROW_ON_ERROR));

        $request->addToContextValues('0', 'Mobile');
        $json = json_decode(json_encode($request, JSON_THROW_ON_ERROR));
        self::assertSame('Mobile', $json->contextValues->{'0'});
        self::assertSame('public', $json->publicField);
        self::assertSame('dynamic', $json->extra);
        self::assertNull($json->term);
        self::assertSame(2, $json->skip);
        self::assertSame(5, $json->take);
        self::assertFalse(property_exists($json, 'protectedField'));
        self::assertFalse(property_exists($json, 'privateField'));
        self::assertFalse(property_exists($json, 'uninitializedField'));
    }

    public function testNestedBatchHttpPayloadRetainsTypeMarkersAndObjectMaps(): void
    {
        $transport = new class implements Client {
            public string $body;
            public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
            {
                $this->body = $data;
                return new Response([], 200, 'application/json');
            }
        };
        $client = new Searcher('dataset', 'key');
        (new \ReflectionProperty(RelewiseClient::class, 'client'))->setValue($client, $transport);
        $request = (new ProductSearchRequest())->setTerm('shoes')->addToContextValues('0', 'Mobile');
        $batch = SearchRequestCollection::create($request)->setContextValuesFromAssociativeArray([]);
        $client->request('SearchRequestCollection', $batch);
        $json = json_decode($transport->body);
        self::assertSame($batch->typeDefinition, $json->{'$type'});
        self::assertInstanceOf(\stdClass::class, $json->contextValues);
        self::assertIsArray($json->requests);
        self::assertSame($request->typeDefinition, $json->requests[0]->{'$type'});
        self::assertSame('shoes', $json->requests[0]->term);
        self::assertSame('Mobile', $json->requests[0]->contextValues->{'0'});
    }

    public function testVariantCreationMillisecondsAndOffsetSurviveRoundTrip(): void
    {
        $variant = VariantResultDetails::hydrate([
            'variantId' => 'v1',
            'createdUtc' => '2026-10-19T12:34:56.789+02:00',
            'lastViewedUtc' => '2026-10-19T12:34:00+02:00',
        ]);
        $json = json_decode(json_encode($variant, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        self::assertSame('2026-10-19T12:34:56.789+02:00', $json['createdUtc']);
        self::assertSame('2026-10-19T12:34:00+02:00', $json['lastViewedUtc']);
        self::assertSame($variant->createdUtc->format('U.u'), VariantResultDetails::hydrate($json)->createdUtc->format('U.u'));
    }
}

#[\AllowDynamicProperties]
class ExtendedContextSearchRequest extends ProductSearchRequest
{
    public string $publicField = 'public';
    public string $uninitializedField;
    protected string $protectedField = 'protected';
    private string $privateField = 'private';
}
