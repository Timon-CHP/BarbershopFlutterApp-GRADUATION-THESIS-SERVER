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
//    Route::group(['middleware' => 'jwt.auth'], function () use ($router) {
//        $router->get('/user/me', 'UserController@me');
//    });

    //TODO test role
    Route::group(['middleware' => ['role:super-admin']], function () use ($router) {
        $router->get('/user/me', 'UserController@me');
    });

    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
    $router->post('/logout', 'AuthController@logout');

    //TODO USER
    RouterHelper::resource($router, '/users', 'UserController');

    //TODO ROLE
    RouterHelper::resource($router, '/roles', 'RoleController');
    Route::post('/roles/create', 'RoleController@createRole');

});
