<?php

namespace App\Models;

class Product
{
    private $id;
    private $name;
    private $value;
    private $quantity;

    /**
     * Product constructor.
     * @param $name
     * @param $value
     * @param $quantity
     */
    public function __construct(string $name = '', float $value = 0, int $quantity = 0)
    {
        $this->name = $name;
        $this->value = $value;
        $this->quantity = $quantity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}
