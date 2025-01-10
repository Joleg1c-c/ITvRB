<?php

declare(strict_types = 1);

namespace App\Http\Actions\Like;

use App\Exception\HttpException;
use App\Http\Actions\ActionInterface;
use App\Http\ErrorResponse;
use App\Http\Request;
use App\Http\Response;
use App\Http\SuccessResponse;
use App\Queries\Like\GetLikesQuery;

class GetLikes implements ActionInterface
{
    public function __construct(private GetLikesQuery $query)
    {
    }

    public function handle(Request $request): Response
    {
        try {
            $postUuid = $request->query('post_uuid');
            $data = $this->query->handle([
                'postUuid' => $postUuid,
            ]);
        } catch (HttpException $ex) {
            return new ErrorResponse($ex->getMessage());
        }

        return new SuccessResponse([
            'likes' => $data,
        ]);
    }
}