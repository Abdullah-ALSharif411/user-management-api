<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponse;


class AuthController extends Controller
{
    use ApiResponse;


    public function Register(RegisterRequest $request){
          $valid=$request->validated();

          $valid['password']=Hash::make($valid['password']);

        $Auth=User::create($valid);

        return $this->successResponse([
            'user'=> new UserResource($Auth)],
             'User registered successfully',201);
    }






    public function Login(LoginRequest $request){
        $valid=$request->validated();

        if(!Auth::attempt($valid))
             return $this->errorResponse('invalid email or password',null,401);

            $user=Auth::user();

            $token = $user->createToken('Auth_Token')->plainTextToken;

            return $this->successResponse([
                'token'=>$token,
                'user'=>new UserResource($user),
    ],'User login Successfully',200);
    }




        public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return $this->successResponse(null,'Logout Successfully');
}


}
