<?php

declare(strict_types=1);

namespace App\Queries\Like;

use App\Exception\CommandException;
use App\Repository\Interfaces\LikesRepositoryInterface;

class GetLikesQuery
{
    public function __construct(
        private LikesRepositoryInterface $likesRepository
    ) {
    }

    public function handle(array $rawInput): array
    {
        $input = $this->parseRawInput($rawInput);

        return $this->likesRepository->getByPostUuid($input['postUuid']);
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

        foreach (['postUuid'] as $argument) {
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
