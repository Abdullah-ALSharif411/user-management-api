<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
     use ApiResponse;
     protected UserService $userService;


     public function __construct(UserService $userService)
{
    $this->userService = $userService;
}
       public function index(Request $request)
    {
         $filters = $request->only(['name', 'email', 'role']);
    $users = $this->userService->listUsers($filters);


        return $this->successResponse([
            UserResource::collection($users)],
            'Users list'
        );
    }

}
