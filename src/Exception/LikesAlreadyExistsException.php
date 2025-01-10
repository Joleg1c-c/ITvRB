<?php

declare(strict_types = 1);

namespace App\Exception;

class LikesAlreadyExistsException extends \Exception
{
    public function __construct(string $postUuid)
    {
        parent::__construct("Like on post $postUuid already exists");
    }
}
