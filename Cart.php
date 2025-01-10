<?php

class Cart {
    public $items = [];

    public function addProduct($product, $quantity) {
        $this->items[$product->id] = $quantity;
    }

    public function removeProduct($product) {
        unset($this->items[$product->id]);
    }

    public function calculateTotal($products) {
        $total = 0;
        foreach ($this->items as $id => $quantity) {
            $total += $products[$id]->price * $quantity;
        }
        return $total;
    }
}

?>
