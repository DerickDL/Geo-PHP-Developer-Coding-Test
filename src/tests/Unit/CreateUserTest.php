<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\UserService;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user() {
        $userData = ['name' => 'John Doe'];
        $userService = new UserService();
        $userService->createUser($userData);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
        ]);
    }
}
