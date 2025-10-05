<?php
require_once 'Product.php';

class Category {
    public string $name;
    private array $products = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function showProducts(): void {
        echo "<h2>Category: {$this->name}</h2>";
        if (empty($this->products)) {
            echo "No products in this category.<br>";
            return;
        }
        foreach ($this->products as $product) {
            echo "<div style='border:1px solid #ccc; padding:10px; margin:5px;'>";
            echo $product->getInfo();
            echo "</div>";
        }
    }
}
?>
