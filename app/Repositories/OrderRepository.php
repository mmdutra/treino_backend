<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository extends Repository
{
    public function __construct()
    {
        $this->table = 'order';
    }

    public function create(Order $order): int
    {
        return $this->createQueryBuilder()->insertGetId([
            'user_id' => $order->getUser()->getId(),
            'date' => date('Y-m-d H:i:s'),
            'qtd_products' => $order->getQtdProducts(),
            'price' => $order->getPrice(),
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
    }
}
