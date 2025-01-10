<?php

class PhysicalProduct extends Product {
    public function calculateFinalPrice($amount) {
        return $this->basePrice * $amount;
    }
}

?>
