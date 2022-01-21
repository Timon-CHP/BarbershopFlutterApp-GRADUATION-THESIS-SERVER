<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryServiceController;
use App\Http\Controllers\DBServiceController;
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
    //Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [AuthController::class, 'logout'])->middleware(['middleware' => 'verify-logged-in']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login-socials/{typeLogin}', [AuthController::class, 'loginWithSocials']);
        Route::post('/login-phone-number', [AuthController::class, 'loginWithPhoneNumber']);
        Route::get('/check-user/{phone_number}', [AuthController::class, 'checkUserExisted']);
        Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    });

    //Category Service
    Route::group(['prefix' => 'category-service'], function () {
        Route::get('/all', [CategoryServiceController::class, 'getAll']);
    });

    //DBService
    Route::group(['prefix' => 'service'], function () {

        Route::get('/{category_service_id}', [DBServiceController::class, 'getByCategoryServiceId']);
    });

    //Location

});
