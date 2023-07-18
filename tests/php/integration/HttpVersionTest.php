<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\Language;
use Relewise\Models\ProductSearchRequest;
use Relewise\Searcher;

class HttpVersionTest extends BaseTestCase
{
    public function testHttpVersionNone(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());
        $searcher->setHttpVersion(CURL_HTTP_VERSION_NONE);

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "p-1",
            0,
            3
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
    }

    public function testHttpVersion1_1(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());
        $searcher->setHttpVersion(CURL_HTTP_VERSION_1_1);

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "p-1",
            0,
            3
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
    }

    public function testHttpVersion2_0(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());
        $searcher->setHttpVersion(CURL_HTTP_VERSION_2_0);

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "p-1",
            0,
            3
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
    }

    public function testHttpVersion2TLS(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());
        $searcher->setHttpVersion(CURL_HTTP_VERSION_2TLS);

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "p-1",
            0,
            3
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
    }
}
