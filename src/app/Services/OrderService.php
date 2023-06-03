<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\QueryException;

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
            return Order::create($orderData);
        } catch (QueryException $e) {
            return false;
        }
        
    }
}