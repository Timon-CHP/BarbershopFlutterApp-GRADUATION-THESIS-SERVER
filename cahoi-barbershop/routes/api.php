<?php

use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1'], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware(['middleware' => 'verify-logged-in']);

    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login-socials/{typeLogin}', [AuthController::class, 'loginWithSocials']);
    Route::post('/auth/login-phone-number/', [AuthController::class, 'loginWithPhoneNumber']);
    Route::get('/auth/check-user/{phone_number}', [AuthController::class, 'checkUserExisted']);
});