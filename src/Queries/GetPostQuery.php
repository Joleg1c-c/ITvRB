<?php

declare(strict_types = 1);

namespace App\Queries;

use App\Exception\CommandException;
use App\Model\Post;
use App\Repository\Interfaces\PostsRepositoryInterface;

class GetPostQuery
{
    public function __construct(
        private PostsRepositoryInterface $postsRepository
    ) {
    }

    public function handle(array $rawInput): Post
    {
        $input = $this->parseRawInput($rawInput);

        return $this->postsRepository->get($input['uuid']);
    }

    public function parseRawInput(array $rawInput): array
    {
        $input = [];

        foreach ($rawInput as $key => $argument) {
            if (!str_contains($argument, '=')) {
                $input[$key] = $argument;
                continue;
            }

            $parts = explode('=', $argument);

            if (count($parts) !== 2) {
                continue;
            }

            $input[$parts[0]] = $parts[1];
        }

        foreach (['uuid'] as $argument) {
            if (!array_key_exists($argument, $input)) {
                throw new CommandException('Обязательный аргумент не указан: ', $argument);
            }

            if (empty($input[$argument])) {
                throw new CommandException('Пустой аргумент: ', $argument);
            }
        }

        return $input;
    }
}
