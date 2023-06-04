<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\UserService;

class UpdateUserNameTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_user_name_success() {
        $userService = new UserService();
        $user = $userService->createUser(['name' => 'Joey']);
        $updatedUser = $userService->updateUserName($user->id, ['name' => 'Wick']);
        $this->assertDatabaseHas('users',[
            'id' => $user->id,
            'name' => 'Wick'
        ]);
    }

    public function test_update_user_name_but_not_exists() {
        $userService = new UserService();
        $updatedUser = $userService->updateUserName(9999, ['name' => 'Wick']);
        $this->assertFalse($updatedUser);
    }
}
