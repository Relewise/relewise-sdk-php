<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Recommender;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\BatchedTrackingRequest;
use Relewise\Models\LicensedRequest;
use Relewise\Models\ProductRecommendationRequest;
use Relewise\Models\ProductRecommendationRequestCollection;
use Relewise\Models\SearchRequest;
use Relewise\Models\SearchRequestCollection;
use Relewise\Models\Trackable;

class BatchingTest extends TestCase
{
    public function testTrackerBatchedTrackingSplitsItemsIntoChunks(): void
    {
        $tracker = new class('dataset-id', 'api-key') extends Tracker {
            public array $calls = [];

            public function requestAndValidate(string $endpoint, LicensedRequest $request)
            {
                $this->calls[] = ['endpoint' => $endpoint, 'request' => $request];
                return null;
            }
        };

        $tracker->setBatchSize(2);

        $items = [
            $this->createTrackable(1),
            $this->createTrackable(2),
            $this->createTrackable(3),
            $this->createTrackable(4),
            $this->createTrackable(5),
        ];

        $request = new BatchedTrackingRequest();
        $request->items = $items;

        $tracker->batch($request);

        self::assertCount(3, $tracker->calls);
        self::assertSame('BatchedTrackingRequest', $tracker->calls[0]['endpoint']);
        self::assertSame('BatchedTrackingRequest', $tracker->calls[1]['endpoint']);
        self::assertSame('BatchedTrackingRequest', $tracker->calls[2]['endpoint']);

        self::assertNotSame($request, $tracker->calls[0]['request']);
        self::assertSame([1, 2], array_map(fn (Trackable $item) => $item->id, $tracker->calls[0]['request']->items));
        self::assertSame([3, 4], array_map(fn (Trackable $item) => $item->id, $tracker->calls[1]['request']->items));
        self::assertSame([5], array_map(fn (Trackable $item) => $item->id, $tracker->calls[2]['request']->items));
        self::assertCount(5, $request->items, 'Original request should remain unchanged');
    }

    public function testSearcherBatchSearchAggregatesChunkResponses(): void
    {
        $searcher = new class('dataset-id', 'api-key') extends Searcher {
            public array $calls = [];
            /** @var array<int, mixed> */
            public array $queuedResponses = [];

            public function queueResponse(array $response): void
            {
                $this->queuedResponses[] = $response;
            }

            public function requestAndValidate(string $endpoint, LicensedRequest $request)
            {
                $this->calls[] = ['endpoint' => $endpoint, 'request' => $request];
                return array_shift($this->queuedResponses);
            }
        };

        $searcher->setBatchSize(2);

        $request = new SearchRequestCollection();
        $request->setRequestsFromArray([
            $this->createSearchRequest(1),
            $this->createSearchRequest(2),
            $this->createSearchRequest(3),
        ]);

        $searcher->queueResponse($this->createSearchResponseCollectionPayload([1, 2]));
        $searcher->queueResponse($this->createSearchResponseCollectionPayload([3]));

        $searcher->batch($request);
        self::assertCount(2, $searcher->calls);
        self::assertSame('SearchRequestCollection', $searcher->calls[0]['endpoint']);
        self::assertSame('SearchRequestCollection', $searcher->calls[1]['endpoint']);
        self::assertNotSame($request, $searcher->calls[0]['request']);
        self::assertSame([1, 2], array_map(fn (SearchRequest $req) => $req->id, $searcher->calls[0]['request']->requests));
        self::assertSame([3], array_map(fn (SearchRequest $req) => $req->id, $searcher->calls[1]['request']->requests));
        self::assertCount(3, $request->requests, 'Original request should remain unchanged');
    }

    public function testRecommenderBatchProductRecommendationMergesResponses(): void
    {
        $recommender = new class('dataset-id', 'api-key') extends Recommender {
            public array $calls = [];
            /** @var array<int, mixed> */
            public array $queuedResponses = [];

            public function queueResponse(array $response): void
            {
                $this->queuedResponses[] = $response;
            }

            public function requestAndValidate(string $endpoint, LicensedRequest $request)
            {
                $this->calls[] = ['endpoint' => $endpoint, 'request' => $request];
                return array_shift($this->queuedResponses);
            }
        };

        $recommender->setBatchSize(2);

        $requestCollection = new ProductRecommendationRequestCollection();
        $requestCollection->requireDistinctProductsAcrossResults = true;
        $requestCollection->setRequestsFromArray([
            $this->createProductRecommendationRequest(1),
            $this->createProductRecommendationRequest(2),
            $this->createProductRecommendationRequest(3),
        ]);

        $recommender->queueResponse($this->createProductRecommendationResponseCollectionPayload([1, 2]));
        $recommender->queueResponse($this->createProductRecommendationResponseCollectionPayload([3]));

        $recommender->batch($requestCollection);
        self::assertCount(2, $recommender->calls);
        self::assertSame('ProductRecommendationRequestCollection', $recommender->calls[0]['endpoint']);
        self::assertSame('ProductRecommendationRequestCollection', $recommender->calls[1]['endpoint']);
        self::assertNotSame($requestCollection, $recommender->calls[0]['request']);
        self::assertSame([1, 2], array_map(fn (ProductRecommendationRequest $req) => $req->id, $recommender->calls[0]['request']->requests));
        self::assertSame([3], array_map(fn (ProductRecommendationRequest $req) => $req->id, $recommender->calls[1]['request']->requests));
        self::assertCount(3, $requestCollection->requests, 'Original request should remain unchanged');
        self::assertTrue($requestCollection->requireDistinctProductsAcrossResults);
    }

    private function createTrackable(int $id): Trackable
    {
        return new class($id) extends Trackable {
            public function __construct(public int $id)
            {
            }
        };
    }

    private function createSearchRequest(int $id): SearchRequest
    {
        return new class($id) extends SearchRequest {
            public function __construct(public int $id)
            {
            }
        };
    }

    private function createProductRecommendationRequest(int $id): ProductRecommendationRequest
    {
        return new class($id) extends ProductRecommendationRequest {
            public function __construct(public int $id)
            {
            }
        };
    }

    /**
     * @param array<int, int> $hits
     */
    private function createSearchResponseCollectionPayload(array $hits): array
    {
        return [
            '$type' => 'Relewise.Client.Responses.Search.SearchResponseCollection, Relewise.Client',
            'responses' => array_map(
                fn (int $hit) => [
                    '$type' => 'Relewise.Client.Responses.Search.ProductSearchResponse, Relewise.Client',
                    'hits' => $hit,
                    'results' => [],
                ],
                $hits
            ),
        ];
    }

    /**
     * @param array<int, int> $ids
     */
    private function createProductRecommendationResponseCollectionPayload(array $ids): array
    {
        return [
            '$type' => 'Relewise.Client.Responses.ProductRecommendationResponseCollection, Relewise.Client',
            'responses' => array_map(
                fn (int $id) => [
                    '$type' => 'Relewise.Client.Responses.ProductRecommendationResponse, Relewise.Client',
                    'recommendations' => [
                        [
                            'productId' => 'product-' . $id,
                            'rank' => $id,
                        ],
                    ],
                ],
                $ids
            ),
        ];
    }
}
