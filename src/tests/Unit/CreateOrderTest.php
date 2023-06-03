<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\UserService;
use App\Services\OrderService;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_order_success() {
        $userService = new UserService();
        $user = $userService->createUser(['name' => 'John Doe']);
        $orderData = [
            'user_id' => $user->id,
            'date' => '2023-06-03',
            'total_value' => 12000
        ];
        $orderService = new OrderService();
        $orderService->createOrder($orderData);
        $this->assertDatabaseHas('orders', $orderData);
    }

    public function test_create_order_fail() {
        $orderData = [
            'date' => '2023-06-03',
            'total_value' => 12000
        ];
        $orderService = new OrderService();
        $order = $orderService->createOrder($orderData);
        $this->assertFalse($order);
    }
}
