<?php

namespace Unit;

use App\Models\Product;

class ProductsTest extends \TestCase
{
    private $product;

    protected function setUp(): void
    {
        $this->product = (new Product())
            ->setName('teste')
            ->setValue(10)
            ->setQuantity(10)
            ->setId(1);

        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testWillReturnObjectAsArray()
    {
        $result = $this->product->toArray();

        $this->assertIsArray($result);

        $this->assertEquals(4, count($result));
    }
}
