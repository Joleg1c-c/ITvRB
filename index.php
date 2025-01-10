<?php

require_once './vendor/autoload.php';

$db = new PDO('sqlite:' . __DIR__ . '/db.sqlite');

use App\Commands\Post\CreatePostCommand;
use App\Commands\Comment\CreateCommentCommand;
use App\Repository\PostsRepository;
use App\Queries\Post\GetPostQuery;
use App\Queries\Comment\GetCommentQuery;
use App\Repository\CommentsRepository;

$postsRepository = new PostsRepository($db);
$commentsRepository = new CommentsRepository($db);

$postCommand = new CreatePostCommand($postsRepository);
$commentCommand = new CreateCommentCommand($commentsRepository);

$postCommand->handle($argv);      // создание поста
$commentCommand->handle($argv); // создание комментария

$postQuery = new GetPostQuery($postsRepository);
$commentQuery = new GetCommentQuery($commentsRepository);

//var_dump($postQuery->handle($argv));      // получение поста
//var_dump($commentQuery->handle($argv));   // получение комментария