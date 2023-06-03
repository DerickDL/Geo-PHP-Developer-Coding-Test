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
}