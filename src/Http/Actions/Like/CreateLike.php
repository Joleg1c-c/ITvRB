<?php

declare(strict_types = 1);

namespace App\Http\Actions\Like;

use App\Commands\Like\CreateLikeCommand;
use App\Exception\HttpException;
use App\Http\Actions\ActionInterface;
use App\Http\ErrorResponse;
use App\Http\Request;
use App\Http\Response;
use App\Http\SuccessResponse;

class CreateLike implements ActionInterface
{
    public function __construct(private CreateLikeCommand $command)
    {
    }

    public function handle(Request $request): Response
    {
        try {
            $authorUuid = $request->body('post_uuid');
            $postUuid = $request->body('user_uuid');
            $this->command->handle([
                'postUuid' => $authorUuid,
                'userUuid' => $postUuid,
            ]);
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        return new SuccessResponse([
            'message' => 'Like was added successfully',
        ]);
    }
}
