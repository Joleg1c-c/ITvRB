<?php

declare(strict_types = 1);

namespace App\Http\Actions\Comment;

use App\Commands\Comment\CreateCommentCommand;
use App\Exception\HttpException;
use App\Http\Actions\ActionInterface;
use App\Http\ErrorResponse;
use App\Http\Request;
use App\Http\Response;
use App\Http\SuccessResponse;

class CreateComment implements ActionInterface
{
    public function __construct(private CreateCommentCommand $command)
    {
    }

    public function handle(Request $request): Response
    {
        try {
            $authorUuid = $request->body('author_uuid');
            $postUuid = $request->body('post_uuid');
            $text = $request->body('text');
            $this->command->handle([
                'authorUuid' => $authorUuid,
                'postUuid' => $postUuid,
                'text' => $text,
            ]);
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        return new SuccessResponse([
            'message' => 'Comment was created successfully',
            'text' => $text,
        ]);
    }
}