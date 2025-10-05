<?php
class Product {
    public string $name;
    public string $description;
    protected float $price;

    public function __construct(string $name, float $price, string $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    public function setPrice(float $price): void {
        if ($price < 0) {
            throw new Exception("Price cannot be negative!");
        }
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getInfo(): string {
        return "Name: {$this->name}<br>" .
               "Price: {$this->price} UAH<br>" .
               "Description: {$this->description}<br>";
    }
}
?>
