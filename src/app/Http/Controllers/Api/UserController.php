<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Models\User;
use App\Requests\CreateUserRequest;

/**
 * @author John Derick De Leon
 * @date 2023-06-03
 * UserController
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor
     */
    public function __construct() {
        $this->userService = new UserService();
    }

    // Test function only
    public function index() {
        return $this->userService->getAllUsers();
    }

    /**
     * Create a new user
     */
    public function create(CreateUserRequest $request) {
        $user = $this->userService->createUser($request->validated());
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }


}
