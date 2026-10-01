<?php

namespace Relewise\Tests\Integration;

use Relewise\Infrastructure\HttpClient\ClientException;
use Relewise\Models\SearchIndexRequest;

class SearchAdministratorTest extends BaseTestCase
{
    public function testGetMissingSearchIndexThrows404(): void
    {
        try {
            $this->searchAdministrator()->searchIndex(
                SearchIndexRequest::create($this->fixtureId('missing-index'))
            );
            self::fail('Expected a 404 response for a missing search index.');
        } catch (ClientException $exception) {
            self::assertSame(404, $exception->getCode());
        }
    }
}
