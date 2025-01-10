<?php

class Review {
    public $productId;
    public $userId;
    public $rating;
    public $comment;

    public function __construct($productId, $userId, $rating, $comment) {
        $this->productId = $productId;
        $this->userId = $userId;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    public function isPositive() {
        return $this->rating >= 4;
    }
}

?>
