<?php
require_once 'Product.php';
require_once 'DiscountedProduct.php';
require_once 'Category.php';

$product1 = new Product("Lenovo Laptop", 28000, "Powerful laptop for work and study");
$product2 = new Product("Samsung Smartphone", 19000, "Modern smartphone with high-quality camera");
$product3 = new DiscountedProduct("Sony Headphones", 2500, "Wireless headphones", 15);
$product4 = new DiscountedProduct("LG Monitor", 8000, "27-inch FullHD monitor", 10);

$category1 = new Category("Electronics");
$category2 = new Category("Computers");

$category1->addProduct($product2);
$category1->addProduct($product3);
$category2->addProduct($product1);
$category2->addProduct($product4);

echo "<h1>Online Store</h1>";
$category1->showProducts();
$category2->showProducts();
?>
