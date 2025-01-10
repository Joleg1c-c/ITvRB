<?php

declare(strict_types = 1);

namespace App\Exception;

class CommentNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Комментарий не найден');
    }
}
