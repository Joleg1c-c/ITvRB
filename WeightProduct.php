<?php

class WeightProduct extends Product {
    public function calculateFinalPrice($amount) {
        return $this->basePrice * $amount;
    }
}

?>
