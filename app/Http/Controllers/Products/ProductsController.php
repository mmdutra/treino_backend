<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{
    private $repository;

    public function __construct
    (
        ProductRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function readAll()
    {
        return response()->json([
            'data' => $this->repository->readAll()
        ],200);
    }

    public function find(int $id)
    {
        return response()->json([
            'data' => $this->repository->find($id)
        ],200);
    }
}
