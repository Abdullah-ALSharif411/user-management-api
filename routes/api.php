<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    require __DIR__ . '/auth.php';
});

//نظام خاص بالمدير
Route::middleware(['auth:sanctum', 'check:Admin'])->group(function () {
    Route::get('/users',[UserController::class,'index']);
});







