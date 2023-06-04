<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\UserService;

class GetUserByIdTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_user_by_id_success() {
        $userService = new UserService();
        $user = $userService->createUser(['name' => 'Joey']);
        $userById = $userService->getUserById($user->id);
        $this->assertEquals($userById->id, $user->id);
    }

    public function test_get_user_by_id_fail() {
        $userService = new UserService();
        $userById = $userService->getUserById(999);
        $this->assertNull($userById);
    }
}
