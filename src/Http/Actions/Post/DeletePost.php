<?php

declare(strict_types = 1);

namespace App\Http\Actions\Post;

use App\Commands\DeletePostCommand;
use App\Exception\HttpException;
use App\Http\Actions\ActionInterface;
use App\Http\ErrorResponse;
use App\Http\Request;
use App\Http\Response;
use App\Http\SuccessResponse;

class DeletePost implements ActionInterface
{
    public function __construct(
        private DeletePostCommand $command,
    ) {
    }

    public function handle(Request $request): Response
    {
        try {
            $uuid = $request->query('uuid');

            $this->command->handle([
                'uuid' => $uuid,
            ]);
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        return new SuccessResponse([
            'message' => 'Post was deleted successfully',
        ]);
    }
}
