<?php

declare(strict_types=1);

namespace App\UseCase;

use App\StatusCodes\CommonCode;
use App\StatusCodes\StatusCodeProvider;

class HandleResult
{
    private function __construct(
        private readonly StatusCodeProvider $code,
        private readonly string $message
    ) {
    }

    /**
     * 処理が成功したときはこのメソッドでクラスを生成する
     */
    public static function success(): self
    {
        return new self(CommonCode::Ok, '');
    }

    /**
     * 処理が失敗したときはこのメソッドでクラスを生成する
     */
    public static function fail(StatusCodeProvider $code, string $message): self
    {
        return new self($code, $message);
    }

    /**
     * 実行結果が失敗だったかどうか
     */
    public function isFailed(): bool
    {
        // これは少し微妙かも
        return $this->code !== CommonCode::Ok;
    }

    public function getCode(): int
    {
        return $this->code->getCode();
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
