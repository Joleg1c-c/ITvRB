<?php

declare(strict_types = 1);

namespace App\Model;

use Symfony\Component\Uid\Uuid;

class User
{
    public function __construct(
        public Uuid $uuid,

        public string $firstName,

        public string $lastName,
    ) {
    }
}
