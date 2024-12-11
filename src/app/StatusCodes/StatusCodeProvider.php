<?php

declare(strict_types=1);

namespace App\StatusCodes;

interface StatusCodeProvider
{
    public function getCode(): int;
}
