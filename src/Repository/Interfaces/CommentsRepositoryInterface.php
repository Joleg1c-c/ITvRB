<?php

declare(strict_types = 1);

namespace App\Repository\Interfaces;

use App\Model\Comment;

interface CommentsRepositoryInterface
{
    public function get(string $uuid): Comment;

    public function save(Comment $comment): void;
}
