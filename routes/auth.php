<?php
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;





Route::post('/register',[AuthController::class,'Register']);
Route::post('/login',[AuthController::class,'Login']);

// محميّ بـ Sanctum
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/profile', function (Illuminate\Http\Request $request) {

        return response()->json([
            'success' => true,
            'message' => 'User profile',
            'data'    => new UserResource($request->user())
        ]);
    });
});
