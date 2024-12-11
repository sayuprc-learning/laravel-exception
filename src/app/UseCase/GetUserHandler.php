<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Domain\User;
use App\Exceptions\Server\ServiceUnavailableException;
use App\StatusCodes\CommonCode;

/**
 * 実際の処理
 */
class GetUserHandler
{
    public function handle(int $id): GetUserResponse
    {
        if ($id === 999) {
            // サーバーエラーは例外にする
            throw new ServiceUnavailableException('応答不可');
        }

        if (! in_array($id, [1, 2, 3], true)) {
            return new GetUserResponse(HandleResult::fail(CommonCode::NotFound, 'ユーザーが見つかりませんでした。'));
        }

        $name = 'ユーザー_' . $id;

        return new GetUserResponse(
            HandleResult::success(),
            new User($id, $name)
        );
    }
}
