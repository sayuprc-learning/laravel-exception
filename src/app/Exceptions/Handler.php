<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\Client\ClientException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Override;
use Psr\Log\LoggerInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    #[Override]
    public function register()
    {
        // この使い方は微妙かも
        $logger = $this->container->get(LoggerInterface::class);
        assert($logger instanceof LoggerInterface);

        $this->reportable(function (Throwable $throwable) use ($logger) {
            if (! $throwable instanceof ClientException) {
                // ユーザーエラー以外はログ出力する
                $logger->error($throwable->getMessage(), [
                    'message' => $throwable->getMessage(),
                    'code' => $throwable->getCode(),
                    'exception' => $throwable,
                ]);
            }
        });

        $this->renderable(function (Throwable $throwable) {
            // サーバーエラーの詳細はユーザーに見せなくてもよい
            $message = $throwable  instanceof ClientException
                ? $throwable->getMessage()
                : 'サーバーでエラーが発生しました。';

            return response()->json([
                'message' => $message,
                'code' => $throwable->getCode(),
            ])->withException($throwable);
        });
    }
}
