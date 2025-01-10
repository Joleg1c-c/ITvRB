<?php
namespace App\Models;

class Comment {
    public $uuid;
    public $post_uuid;
    public $author_uuid;
    public $text;

    public function __construct($uuid, $post_uuid, $author_uuid, $text) {
        $this->uuid = $uuid;
        $this->post_uuid = $post_uuid;
        $this->author_uuid = $author_uuid;
        $this->text = $text;
    }
}


?>