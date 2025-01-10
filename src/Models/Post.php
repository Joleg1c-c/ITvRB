<?php
namespace App\Models;

class Post {
    public $uuid;
    public $post_uuid;
    public $title;
    public $text;

    public function __construct($uuid, $post_uuid, $title, $text) {
        $this->uuid = $uuid;
        $this->post_uuid = $post_uuid;
        $this->title = $title;
        $this->text = $text;
    }
}

?>