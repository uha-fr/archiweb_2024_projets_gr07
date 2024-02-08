<?php
class ShowContent {
    private $product;
    
    function __construct($product) {
        $this->product = $product;
    }
    
    function __toString() {
        return "<div>le nom de recette est: {$this->product}</div>";
    }
}
?>