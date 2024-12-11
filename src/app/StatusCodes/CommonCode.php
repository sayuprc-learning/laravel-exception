<?php

declare(strict_types=1);

namespace App\StatusCodes;

enum CommonCode: int implements StatusCodeProvider
{
    // 正常終了
    case Ok = 0;

    // 対象のデータが見つからない
    case NotFound = 404;

    // 想定外の例外
    case Exceptions = 9999;

    public function getCode(): int
    {
        return $this->value;
    }
}
