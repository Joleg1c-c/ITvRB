<?php

declare(strict_types = 1);

namespace App\Commands;

use App\Exception\CommandException;
use App\Model\Post;
use App\Repository\Interfaces\PostsRepositoryInterface;
use Symfony\Component\Uid\Uuid;

class CreatePostCommand
{
    public function __construct(
        private PostsRepositoryInterface $postsRepository
    ) {
    }

    public function handle(array $rawInput): void
    {
        $input = $this->parseRawInput($rawInput);

        $this->postsRepository->save(new Post(
            Uuid::v4(),
            new Uuid($input['authorUuid']),
            $input['title'],
            $input['text'],
        ));
    }

    public function parseRawInput(array $rawInput): array
    {
        $input = [];

        foreach ($rawInput as $argument) {
            $parts = explode('=', $argument);

            if (count($parts) !== 2) {
                continue;
            }

            $input[$parts[0]] = $parts[1];
        }

        foreach (['authorUuid', 'title', 'text'] as $argument) {
            if (!array_key_exists($argument, $input)) {
                throw new CommandException('Обязательный аргумент не найден:', $argument);
            }

            if (empty($input[$argument])) {
                throw new CommandException('Пустой аргумент: ', $argument);
            }
        }

        return $input;
    }
}