<?php

declare(strict_types=1);

namespace App\StatusCodes;

enum AuthCode: int implements StatusCodeProvider
{
    // 許可されていない
    case UnAuthorized = 401;

    public function getCode(): int
    {
        return $this->value;
    }
}
