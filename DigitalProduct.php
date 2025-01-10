<?php

class DigitalProduct extends Product {
    public function calculateFinalPrice($amount) {
        return $this->basePrice / 2;
    }
}

?>
