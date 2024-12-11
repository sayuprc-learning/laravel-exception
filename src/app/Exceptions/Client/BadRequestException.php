<?php

declare(strict_types=1);

namespace App\Exceptions\Client;

use Symfony\Component\HttpFoundation\Response;

class BadRequestException extends ClientException
{
    public function __construct(string $message = '')
    {
        parent::__construct($message, Response::HTTP_BAD_REQUEST);
    }
}
