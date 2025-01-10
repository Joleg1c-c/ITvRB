<?php

declare(strict_types = 1);

namespace App\Repository\Interfaces;

use App\Model\Like;

interface LikesRepositoryInterface
{
    public function save(Like $like): void;

    public function getByPostUuid(string $uuid): array;

    public function isExists(string $postUuid, string $userUuid): bool;
}
