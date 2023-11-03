<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index(Request $request): JsonResponse
    {
        return $this->successResponse(
            UserResource::collection(
                $this->userService->getAllUsers(
                    $request->all()
                )
            )
        );
    }
}
