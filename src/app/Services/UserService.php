<?php

namespace App\Services;

use App\Models\User;

/**
 * @author John Derick De Leon
 * @date 2023-06-03
 * UserService
 */
class UserService
{
    /**
     * Create a new user
     */
    public function createUser($userData) {
        return User::create($userData);
    }

    public function getAllUsers() {
        return User::all();
    }
}