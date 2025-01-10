<?php

namespace App\Exception;

class InvalidUuidException extends \Exception
{
    public function __construct(string $uuid)
    {
        parent::__construct('Invalid UUID: ' . $uuid);
    }
}