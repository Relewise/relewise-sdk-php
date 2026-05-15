<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Infrastructure\HttpClient\UnauthorizedException;
use Relewise\Models\LicensedRequest;
use Relewise\RelewiseClient;

class RelewiseClientErrorHandlingTest extends TestCase
{
    public function testUnauthorizedWithNullBodyIncludesVerificationGuidance(): void
    {
        $client = $this->createClientReturning(new Response(null, 401, null));

        $this->assertUnauthorizedExceptionMessageContains($client, array(
            "Unauthorized. Verify that:",
            "a valid API key has been provided",
            "the API key has permission to call ProductSearchRequest",
            "the datasetId and serverUrl are correct for the API key",
        ));
    }

    public function testUnauthorizedWithApiTextResponseIncludesApiMessage(): void
    {
        $apiMessage = "The provided API Key does not have the required permission to authorize execution of ProductSearchRequest";
        $client = $this->createClientReturning(new Response($apiMessage, 401, "text/plain"));

        $this->assertUnauthorizedExceptionMessageEquals($client, $apiMessage);
    }

    public function testUnauthorizedWithStructuredBodyUsesEncodedBody(): void
    {
        $client = $this->createClientReturning(new Response(array(
            "message" => "The provided API Key does not have the required permission."
        ), 401, "application/json"));

        $this->assertUnauthorizedExceptionMessageEquals($client, '{"message":"The provided API Key does not have the required permission."}');
    }

    /**
     * @param string[] $expectedMessages
     */
    private function assertUnauthorizedExceptionMessageContains(RelewiseClient $client, array $expectedMessages): void
    {
        try
        {
            $client->requestAndValidate("ProductSearchRequest", $this->createLicensedRequest());
        }
        catch (UnauthorizedException $exception)
        {
            self::assertSame(401, $exception->getCode());

            foreach ($expectedMessages as $expectedMessage)
            {
                self::assertStringContainsString($expectedMessage, $exception->getMessage());
            }

            return;
        }

        self::fail("Expected UnauthorizedException to be thrown.");
    }

    private function assertUnauthorizedExceptionMessageEquals(RelewiseClient $client, string $expectedMessage): void
    {
        try
        {
            $client->requestAndValidate("ProductSearchRequest", $this->createLicensedRequest());
        }
        catch (UnauthorizedException $exception)
        {
            self::assertSame(401, $exception->getCode());
            self::assertSame($expectedMessage, $exception->getMessage());

            return;
        }

        self::fail("Expected UnauthorizedException to be thrown.");
    }

    private function createClientReturning(Response $response): RelewiseClient
    {
        return new class($response) extends RelewiseClient {
            public function __construct(private Response $response)
            {
                parent::__construct("00000000-0000-0000-0000-000000000001", "api-key", 5);
            }

            public function request(string $endpoint, LicensedRequest $request): Response
            {
                return $this->response;
            }
        };
    }

    private function createLicensedRequest(): LicensedRequest
    {
        return new class extends LicensedRequest {
        };
    }
}
