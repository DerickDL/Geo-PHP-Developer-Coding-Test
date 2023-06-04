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
     * @lrd:start
     * *Create order request*
     * @lrd:end
     * 
     * @LRDparam user_id required|integer
     * 
     * @LRDparam total_value required|numeric
     * 
     * @LRDresponses 201|500
     */
    public function create(CreateOrderRequest $request) {
        $order = $this->orderService->createOrder($request->validated());
        if (isset($order->id)) {
            return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
        }
        return response()->json(['error' => 'Order creation unsuccessful'], 500);;
    }

    /**
     * @lrd:start
     * *Get all orders by user id*
     * @lrd:end
     * 
     * @LRDresponses 200
     */
    public function getOrdersByUser($userId) {
        $orders = $this->orderService->getOrdersByUserId($userId);
        return response()->json(['order' => $orders], 200);
    }
}
