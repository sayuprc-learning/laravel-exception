<?php

declare(strict_types=1);

namespace App\StatusCodes;

enum UserCode: int implements StatusCodeProvider
{
    // ユーザーのステータスが不正
    case InvalidStatus = 300;

    public function getCode(): int
    {
        return $this->value;
    }
}
