<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Models\User;
use App\Requests\UserRequest;
use OpenApi\Annotations as OA;

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
    public function create(UserRequest $request) {
        $user = $this->userService->createUser($request->validated());
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    /**
     * Get a user by id
     */
    public function getById($id) {
        $user = $this->userService->getUserById($id);
        return response()->json(['user' => $user], 201);
    }

    /**
     * Update a user name
     */
    public function updateUserName($userId, UserRequest $request) {
        $updateUser = $this->userService->updateUserName($userId, $request->validated());
        if ($updateUser === false) {
            return response()->json(['error' => 'User cannot be updated'], 404);
        }
        return response()->json(['message' => 'User successfully updated'], 201);
    }
}
