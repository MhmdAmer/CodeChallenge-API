<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('login', [AuthController::class, "login"]);
Route::group([

    'middleware' => 'auth',

], function () {

    Route::get('customers', [CustomerController::class, "getCustomers"]);
    Route::get('average', [CustomerController::class, "getAverageRegistrations"]);
    Route::post('logout', [AuthController::class, "logout"]);
    Route::post('refresh', [AuthController::class, "refresh"]);
});
