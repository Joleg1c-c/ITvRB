<?php
namespace App\Repositories;
use App\Models\Post;

interface PostsRepositoryInterface {
    public function get($uuid): Post;
    public function save(Post $article);
}

?>