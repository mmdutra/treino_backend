<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\OrderProductsRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $repository;
    private $orderProductsRepository;
    private $productRepository;

    public function __construct
    (
        OrderRepository $repository,
        OrderProductsRepository $orderProductsRepository,
        ProductRepository $productRepository
    )
    {
        $this->repository = $repository;
        $this->orderProductsRepository = $orderProductsRepository;
        $this->productRepository = $productRepository;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'products' => 'required|array|min:1'
        ]);

        $order = new Order();
        $order->setUser($request->auth);

        try {
            $products = $this->productRepository->verifyProducts($request->input('products'));

            $order->setProducts($products);

            $id = $this->repository->create($order);
            $order->setId($id);

            $this->orderProductsRepository->create($order);

            return response()->json(['message' => 'Registro inserido com sucesso!'], 200);

        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage(), 'message' => 'Não foi possível inserir o registro! Verifique os dados novamente!'], 400);
        }
    }
}
