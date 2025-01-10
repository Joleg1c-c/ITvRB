<?php

declare(strict_types = 1);

namespace App\Exception;

class HttpException extends \Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}
