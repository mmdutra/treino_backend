<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends Repository
{
    public function __construct()
    {
        $this->table = 'products';
    }

    private function buildProduct($result)
    {
        $product = new Product($result->name, $result->value, $result->quantity);
        $product->setId($result->id);
        return $product;
    }

    public function readAll()
    {
        return $this->createQueryBuilder()->get();
    }

    public function find(int $id)
    {
        $result = $this->createQueryBuilder()->find($id);

        if (!is_null($result)) return $this->buildProduct($result);

        return null;
    }

    /**
     * @param array $items
     * @return array
     * @throws \Exception
     */
    public function verifyProducts(array $items)
    {
        $products = [];

        foreach ($items as $item) {
            $product = $this->find($item['id']);

            if (is_null($product)) throw new \Exception("Produto não existente!");

            $products[] = $product;
        }

        return $products;
    }
}
