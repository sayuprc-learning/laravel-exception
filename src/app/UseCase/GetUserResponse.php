<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Domain\User;

/**
 * 処理の結果を格納する DTO
 *
 * 処理結果と処理が返すべき値を格納している
 */
class GetUserResponse
{
    public function __construct(
        public readonly HandleResult $result,
        public readonly ?User $user = null,
    ) {
    }
}
