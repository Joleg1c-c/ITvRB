<?php

class Product {
    public $id;
    public $name;
    public $description;
    public $price;
    public $stock;

    public function __construct($id, $name, $description, $price, $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getPriceWithDiscount($discount) {
        return $this->price - ($this->price * $discount / 100);
    }

    public function updateStock($quantity) {
        $this->stock -= $quantity;
    }
}

?>
