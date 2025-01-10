<?php

class DigitalProduct extends Product {
    public $fileSize;
    public $downloadLink;

    public function __construct($id, $name, $description, $price, $stock, $fileSize, $downloadLink) {
        parent::__construct($id, $name, $description, $price, $stock);
        $this->fileSize = $fileSize;
        $this->downloadLink = $downloadLink;
    }

    public function download() {
        // Логика для загрузки товара
    }
}

?>
