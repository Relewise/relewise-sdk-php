<?php
declare(strict_types=1);

namespace Relewise\Models\DTO;

use Articus\DataTransfer\PhpAttribute as DTA;

class User
{
    #[DTA\Data(field: "authenticatedId", nullable: true)]
    #[DTA\Validator("Scalar", ["type" => "string"])]
    public string|null $authenticated_id = null;

    #[DTA\Data(field: "temporaryId", nullable: true)]
    #[DTA\Validator("Scalar", ["type" => "string"])]
    public string|null $temporary_id = null;

    #[DTA\Data(field: "email", nullable: true)]
    #[DTA\Validator("Scalar", ["type" => "string"])]
    public string|null $email = null;

    #[DTA\Data(field: "classifications", nullable: true)]
    #[DTA\Strategy("Object", ["type" => ::class])]
    #[DTA\Validator("TypeCompliant", ["type" => ::class])]
    public array|null $classifications = null;

    #[DTA\Data(field: "identifiers", nullable: true)]
    #[DTA\Strategy("Object", ["type" => ::class])]
    #[DTA\Validator("TypeCompliant", ["type" => ::class])]
    public array|null $identifiers = null;

    #[DTA\Data(field: "data", nullable: true)]
    #[DTA\Strategy("Object", ["type" => ::class])]
    #[DTA\Validator("TypeCompliant", ["type" => ::class])]
    public array|null $data = null;

    #[DTA\Data(field: "fingerprint", nullable: true)]
    #[DTA\Validator("Scalar", ["type" => "string"])]
    public string|null $fingerprint = null;

}
