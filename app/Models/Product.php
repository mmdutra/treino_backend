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

    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): Product
    {
        $this->value = $value;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Product
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'value'=> $this->getValue(),
            'quantity' => $this->getQuantity()
        ];
    }
}
