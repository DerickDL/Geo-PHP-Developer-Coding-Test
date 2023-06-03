<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Requests\CreateOrderRequest;

/**
 * @author John Derick De Leon
 * @date 2023-06-03
 * OrderController
 */
class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * OrderController constructor
     */
    public function __construct() {
        $this->orderService = new OrderService();
    }

    /**
     * Create a new order
     */
    public function create(CreateOrderRequest $request) {
        $order = $this->orderService->createOrder($request->validated());
        if (isset($order->id)) {
            return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
        }
        return response()->json(['error' => 'Order creation unsuccessful'], 500);;
    }


}
