<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

/**
 * @author John Derick De Leon
 * @date 2023-06-03
 * OrderService
 */
class OrderService
{
    /**
     * Create a new order
     */
    public function createOrder($orderData) {
        try {
            $orderData['date'] = Carbon::now()->toDateString();
            return Order::create($orderData);
        } catch (QueryException $e) {
            return false;
        }
        
    }

    /**
     * Get all orders by user id
     */
    public function getOrdersByUserId($userId) { 
        $ordersByUser = Order::where('user_id', $userId)->get();
        $sum_total_value = 0;
        $orders = [];

        foreach ($ordersByUser as $order) {
            $sum_total_value += $order->total_value;
            $orders[] = $order;
        }
        return [
            'orders' => $orders,
            'sum_total_value' => $sum_total_value
        ];
    }
}