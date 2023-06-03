<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\OrderService;
use App\Services\UserService;

class GetOrdersByUserIdTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_orders_by_users() {
        $userService = new UserService();
        $user = $userService->createUser(['name' => 'John Doe']);
        
        $orderService = new OrderService();
        $orderService->createOrder([
            'user_id' => $user->id,
            'total_value' => 10000,
        ]);
        $orderService->createOrder([
            'user_id' => $user->id,
            'total_value' => 20000,
        ]);
        $orderService->createOrder([
            'user_id' => $user->id,
            'total_value' => 30000,
        ]);
        $userOrders = $orderService->getOrdersByUserId($user->id);
        $this->assertEquals($userOrders['sum_total_value'], 60000);
        $this->assertCount(3, $userOrders['orders']);

    }

    public function test_get_user_orders_fail() {
        $orderService = new OrderService();
        $userOrders = $orderService->getOrdersByUserId(999);
        $this->assertEquals($userOrders['sum_total_value'], 0);
        $this->assertCount(0, $userOrders['orders']);
    }
}
