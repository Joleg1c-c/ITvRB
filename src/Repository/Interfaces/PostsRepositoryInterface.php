<?php

declare(strict_types = 1);

namespace App\Repository\Interfaces;

use Faker\Core\Uuid;
use App\Model\Post;

interface PostsRepositoryInterface
{
    public function get(string $uuid): Post;

    public function save(Post $post): void;
}
