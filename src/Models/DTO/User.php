<?php
declare(strict_types=1);

namespace Relewise\Models\DTO;

class User
{
    public string|null $authenticatedId = null;

    public string|null $temporaryId = null;

    public string|null $email = null;

    public array|null $classifications = null;

    public array|null $identifiers = null;

    public array|null $data = null;

    public string|null $fingerprint = null;

}
