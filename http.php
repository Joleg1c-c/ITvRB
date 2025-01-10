<?php

require_once './vendor/autoload.php';

use App\Commands\CreateCommentCommand;
use App\Commands\CreatePostCommand;
use App\Commands\DeletePostCommand;
use App\Http\Actions\Comment\CreateComment;
use App\Http\Actions\Post\CreatePost;
use App\Http\Actions\Post\DeletePost;
use App\Http\ErrorResponse;
use App\Http\Request;
use App\Repository\CommentsRepository;
use App\Repository\PostsRepository;
use App\Exception\HttpException;
use App\Repository\UsersRepository;

$db = new PDO('sqlite:' . __DIR__ . '/my_database.sqlite');
$postsRepository = new PostsRepository($db);
$commentsRepository = new CommentsRepository($db);
$userRepository = new UsersRepository($db);

$postCommand = new CreatePostCommand($postsRepository);
$postDeleteCommand = new DeletePostCommand($postsRepository);
$commentCommand = new CreateCommentCommand($commentsRepository);

$content = json_decode(
    file_get_contents('php://input'),
    true
);
$request = new Request(
    $_GET,
    $content ?? [],
    $_SERVER
);

try {
    $path = $request->path();
} catch (HttpException) {
    (new ErrorResponse())->send();
    return;
}

$routes = [
    '/posts/comment' => new CreateComment($commentCommand),
    '/posts' => new CreatePost($postCommand, $userRepository),
    '/posts/delete' => new DeletePost($postDeleteCommand),
];

if (!array_key_exists($path, $routes)) {
    (new ErrorResponse('Маршрут не найден'))->send();
    return;
}

$action = $routes[$path];

try {
    $response = $action->handle($request);
    $response->send();
    die();
} catch (Exception $e) {
    (new ErrorResponse($e->getMessage()))->send();
}
