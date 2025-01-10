<?php

abstract class Product {
    public $id;
    public $name;
    public $basePrice;

    public function __construct($id, $name, $basePrice) {
        $this->id = $id;
        $this->name = $name;
        $this->basePrice = $basePrice;
    }

    abstract public function calculateFinalPrice($amount);
    
    public function getRevenue($amount) {
        return $this->calculateFinalPrice($amount);
    }
}

?>
