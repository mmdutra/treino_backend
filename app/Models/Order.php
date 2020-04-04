<?php

namespace App\Models;

class Order
{
    private $id;
    private $date;
    private $user;
    private $products;
    private $qtd_products;
    private $price;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
        $this->qtd_products = count($products);

        foreach ($products as $product) {
            $this->price += $product->getValue();
        }
    }

    public function getQtdProducts(): int
    {
        return $this->qtd_products;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
