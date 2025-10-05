<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    private float $discount;

    public function __construct(string $name, float $price, string $description, float $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice(): float {
        return $this->getPrice() * (1 - $this->discount / 100);
    }

    public function getInfo(): string {
        return "Name: {$this->name}<br>" .
               "Original Price: {$this->getPrice()} UAH<br>" .
               "Discount: {$this->discount}%<br>" .
               "Discounted Price: " . number_format($this->getDiscountedPrice(), 2) . " UAH<br>" .
               "Description: {$this->description}<br>";
    }
}
?>
