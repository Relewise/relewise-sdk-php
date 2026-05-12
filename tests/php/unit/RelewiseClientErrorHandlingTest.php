<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Infrastructure\HttpClient\UnauthorizedException;
use Relewise\Models\LicensedRequest;
use Relewise\RelewiseClient;

class RelewiseClientErrorHandlingTest extends TestCase
{
    public function testUnauthorizedWithNullBodyUsesFallbackMessage(): void
    {
        $client = $this->createClientReturning(new Response(null, 401, null));

        $this->expectException(UnauthorizedException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage("Unauthorized");

        $client->requestAndValidate("ProductSearchRequest", $this->createLicensedRequest());
    }

    public function testUnauthorizedWithApiTextResponseIncludesApiMessage(): void
    {
        $apiMessage = "The provided API Key does not have the required permission to authorize execution of ProductSearchRequest";
        $client = $this->createClientReturning(new Response($apiMessage, 401, "text/plain"));

        $this->expectException(UnauthorizedException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage($apiMessage);

        $client->requestAndValidate("ProductSearchRequest", $this->createLicensedRequest());
    }

    public function testUnauthorizedWithStructuredBodyUsesEncodedBody(): void
    {
        $client = $this->createClientReturning(new Response(array(
            "message" => "The provided API Key does not have the required permission."
        ), 401, "application/json"));

        $this->expectException(UnauthorizedException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage('{"message":"The provided API Key does not have the required permission."}');

        $client->requestAndValidate("ProductSearchRequest", $this->createLicensedRequest());
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
