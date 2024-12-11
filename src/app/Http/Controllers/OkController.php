<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class OkController extends Controller
{
    /**
     * @return array{code: int}
     */
    public function index(): array
    {
        return [
            'code' => Response::HTTP_OK,
        ];
    }
}
