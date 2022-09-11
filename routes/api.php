<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/foods', [FoodController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/foods', [FoodController::class, 'store']);
    Route::put('/food/{food}', [FoodController::class, 'update']);
    Route::delete('/food/{food}', [FoodController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
