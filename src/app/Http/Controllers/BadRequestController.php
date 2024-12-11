<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\Client\BadRequestException;

class BadRequestController extends Controller
{
    public function index()
    {
        throw new BadRequestException('リクエストが不正です。');
    }
}
