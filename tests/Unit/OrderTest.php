<?php

namespace Unit;

use App\Models\Order;
use App\Models\Product;

class OrderTest extends \TestCase
{
    public function testWillInsertProductsToOrder()
    {
        $p1 = (new Product())
            ->setId(1)
            ->setValue(10);

        $p2 = (new Product())
            ->setId(2)
            ->setValue(20);

        $products = [$p1, $p2];

        $order = new Order();
        $order->setProducts($products);

        $this->assertEquals(2, $order->getQtdProducts());
        $this->assertEquals(30, $order->getPrice());
    }
}
