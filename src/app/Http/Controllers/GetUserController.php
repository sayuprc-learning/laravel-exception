<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\UseCase\GetUserHandler;

class GetUserController extends Controller
{
    public function __construct(private readonly GetUserHandler $handler)
    {
    }

    public function index(int $id)
    {
        $response = $this->handler->handle($id);

        if ($response->result->isFailed()) {
            return [
                'message' => $response->result->getMessage(),
                'code' => $response->result->getCode(),
            ];
        }

        return [
            'message' => $response->result->getMessage(),
            'code' => $response->result->getCode(),
            'body' => [
                'user' => $response->user,
            ],
        ];
    }
}
