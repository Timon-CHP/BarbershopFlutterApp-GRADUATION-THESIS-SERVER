<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;
use YaangVu\LaravelBase\Helpers\RouterHelper;

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});


$router->group(['prefix' => '/api'], function () use ($router) {
    //TODO AUTHENTICATION
    Route::group(['middleware' => 'jwt.auth'], function () use ($router) {
        //User
        Route::group(['prefix' => '/user'], function () use ($router) {
            $router->get('/me', 'UserController@me');
            $router->post('/check-password', 'UserController@checkPassword');
            $router->post('/change-password', 'UserController@changePassword');
        });
        RouterHelper::resource($router, 'users', 'UserController');

        //Facility
        RouterHelper::resource($router, 'facilities', 'FacilityController');
        Route::group(['prefix' => '/facility'], function () use ($router) {
            $router->get('/stylist', 'FacilityController@getViaUserId');
        });

        //Product
        RouterHelper::resource($router, 'products', 'ProductController');
        $router->get('product/{typeId}', 'ProductController@getViaTypeProductId');

        //Task
        Route::group(['prefix' => '/task'], function () use ($router) {
            $router->post('/', "TaskController@createTask");
            $router->get('/', "TaskController@getTaskViaDay");
            $router->post('/update-status', "TaskController@updateStatus");
            $router->get('/detail', "TaskController@getDetail");
            $router->get('/customer/history', "TaskController@getHistory");
            $router->delete('/', "TaskController@deleteTask");
            $router->get('/clean', "TaskController@cleanOldTask");
            $router->get('/can-book', "TaskController@checkCanBook");
        });

        //Bill
        Route::group(['prefix' => '/bill'], function () use ($router) {
            $router->post('/', "BillController@createBill");
        });

        //Discount
        Route::group(['prefix' => '/discount'], function () use ($router) {
            $router->get('/code', "DiscountController@getViaCode");
        });

        //Time Slot
        Route::group(['prefix' => 'time-slot'], function () use ($router) {
            $router->get('/', "TimeSlotController@getTimeSlot");
            $router->get('/{stylistId}', "TimeSlotController@getTimeSlotViaStylistId");
        });

        //Post
        Route::group(['prefix' => '/post'], function () use ($router) {
            $router->post('/', "PostController@createPost");
            $router->delete('/', "PostController@deleteMyPost");
            $router->post('/edit', "PostController@updateMyPost");
            $router->get('/in-month', "PostController@getViaMonth");
            $router->get('/wall', "PostController@getViaUserId");
            $router->post('/like', "PostController@like");
        });

        // Rating
        Route::group(['prefix' => '/rating'], function () use ($router) {
            $router->get('/{taskId}', "RatingController@getViaTaskId");
            $router->post('/', "RatingController@createViaTaskId");
        });

        //TODO REPORT
        Route::group(['prefix' => '/report'], function () use ($router) {
            $router->get('/month/{month}', "ReportController@reportSalesViaMonth");
            $router->get('/daily', "ReportController@reportSalesDaily");
        });
    });

    Route::group(['prefix' => 'auth'], function () use ($router) {
        $router->post('/login/phone-number', 'AuthController@loginWithPhoneNumber');
        $router->post('/login/facebook', 'AuthController@loginWithFacebook');
        $router->post('/login/google', 'AuthController@loginWithGoogle');
        $router->post('/register', 'AuthController@register');
        $router->post('/refresh-token', 'AuthController@refreshToken');
        $router->get('/logout', 'AuthController@logout');
    });

    //Type Product
    RouterHelper::resource($router, 'type-products', 'TypeProductController');

    //Product
    $router->get('/product', 'ProductController@getProduct');

    Route::group(['prefix' => '/stylist'], function () use ($router) {
        $router->get('/facility/{facilityId}', 'StylistController@getViaFacility');
        $router->get('/rating/{stylistId}', 'StylistController@getRatingViaStylistId');
    });

    $router->get('/user/check-exist', 'UserController@checkExist');

    //TODO test role
    Route::group(['middleware' => ['role:super-admin']], function () use ($router) {
        //User
        Route::group(['prefix' => '/user'], function () use ($router) {
            $router->get('/search', 'UserController@searchUser');
        });

        //Role
        RouterHelper::resource($router, 'roles', 'RoleController');
        $router->post('/role/sync-role', 'RoleController@syncRoleViaUser');
        $router->get('/role/except', 'RoleController@getAllExceptSuperAdmin');

        // Product
        $router->post('/product', 'ProductController@createProduct');
        $router->post('/product/edit/{productId}', 'ProductController@updateViaProductId');
        $router->delete('/product/{productId}', 'ProductController@deleteViaProductId');
    });
});
