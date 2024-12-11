<?php

declare(strict_types=1);

namespace App\Exceptions\Server;

use Symfony\Component\HttpFoundation\Response;

class ServiceUnavailableException extends ServerException
{
    public function __construct(string $message = '')
    {
        parent::__construct($message, Response::HTTP_SERVICE_UNAVAILABLE);
    }
}
