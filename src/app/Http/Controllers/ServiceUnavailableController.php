<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\Server\ServiceUnavailableException;

class ServiceUnavailableController extends Controller
{
    public function index()
    {
        throw new ServiceUnavailableException('リクエストを処理する準備ができていません。');
    }
}
