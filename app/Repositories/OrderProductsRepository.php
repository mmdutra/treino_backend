<?php

namespace App\Repositories;

use App\Models\Order;

class OrderProductsRepository extends Repository
{
    public function __construct()
    {
        $this->table = 'order_products';
    }

    public function create(Order $order)
    {
        $queryBuilder = $this->createQueryBuilder();

        foreach ($order->getProducts() as $product) {
            $queryBuilder->insert([
                'order_id' => $order->getId(),
                'product_id' => $product->getId()
            ]);
        }
    }
}
