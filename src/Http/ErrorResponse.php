<?php

declare(strict_types=1);

namespace App\Http;

class ErrorResponse extends Response
{
    protected const SUCCESS = false;

    public function __construct(
        private string $message = 'Something went wrong',
    ) {
    }

    protected function payload(): array
    {
        return ['message' => $this->message];
    }
}
