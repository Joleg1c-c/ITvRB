<?php
require_once __DIR__ . '/vendor/autoload.php';

use Faker\Factory;
use App\Article;
use App\Comment;
use App\User;

$faker = Factory::create();

$user = new User(1, $faker->firstName, $faker->lastName);
$article = new Article(1, $user->id, $faker->sentence, $faker->paragraph);
$comment = new Comment(1, $user->id, $article->id, $faker->sentence);

echo "User: {$user->firstName} {$user->lastName}<br>";
echo "Article: {$article->title}<br>";
echo "Comment: {$comment->text}<br>";
?>