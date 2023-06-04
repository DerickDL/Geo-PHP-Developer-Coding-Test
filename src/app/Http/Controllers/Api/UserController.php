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

    /**
     * @lrd:start
     * *Create a new user*
     * @lrd:end
     * 
     * @LRDparam name required|string
     * 
     * @LRDresponses 201
     */
    public function create(UserRequest $request) {
        $user = $this->userService->createUser($request->validated());
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

   /**
     * @lrd:start
     * *Get a user by ID*
     * @lrd:end
     * 
     * @LRDresponses 200
     */
    public function getById($id) {
        $user = $this->userService->getUserById($id);
        return response()->json(['user' => $user], 200);
    }

    /**
     * @lrd:start
     * *Update user name*
     * @lrd:end
     * 
     * @LRDparam name required|string
     * 
     * @LRDresponses 201|404
     */
    public function updateUserName($userId, UserRequest $request) {
        $updateUser = $this->userService->updateUserName($userId, $request->validated());
        if ($updateUser === false) {
            return response()->json(['error' => 'User cannot be updated'], 404);
        }
        return response()->json(['message' => 'User successfully updated'], 201);
    }
}
