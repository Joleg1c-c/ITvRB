<?php

declare(strict_types = 1);

namespace App\Repository\Interfaces;

use App\Model\User;

interface UsersRepositoryInterface
{
    public function get(string $uuid): User;
    public function save(User $user): void;
}