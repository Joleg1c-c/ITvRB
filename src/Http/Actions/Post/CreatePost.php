<?php

namespace App\Http\Actions\Post;

use App\Commands\Post\CreatePostCommand;
use App\Exception\HttpException;
use App\Exception\InvalidUuidException;
use App\Http\Actions\ActionInterface;
use App\Http\ErrorResponse;
use App\Http\Request;
use App\Http\Response;
use App\Http\SuccessResponse;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Uid\Uuid;

class CreatePost implements ActionInterface
{
    public function __construct(
        private CreatePostCommand $command,
        private UsersRepositoryInterface $usersRepository,
    ) {
    }

    public function handle(Request $request): Response
    {
        try {
            $authorUuid = $request->body('author_uuid');

            if (!Uuid::isValid($authorUuid)) {
                throw new InvalidUuidException($authorUuid);
            }
            $this->usersRepository->get($authorUuid);

            $title = $request->body('title');
            $text = $request->body('text');
            $this->command->handle([
                'authorUuid' => $authorUuid,
                'title' => $title,
                'text' => $text,
            ]);
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        return new SuccessResponse([
            'message' => 'Post was created successfully',
            'title' => $title,
            'text' => $text,
        ]);
    }
}
