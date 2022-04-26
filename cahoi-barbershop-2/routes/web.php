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

use YaangVu\LaravelBase\Helpers\RouterHelper;

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

RouterHelper::resource($router, '/api/users', 'UserController');

$router->post('api/login-phone-number', 'AuthController@loginWithPhoneNumber');
$router->post('api/register', 'AuthController@register');

$router->post('api/role', 'RoleController@createRole');
$router->get('api/auth/me', 'AuthController@me');





//$router->group(['prefix'=>'/api','middleware'=>'auth'], function () use ($router){
//    $router->post('/logout','AuthController@logout');
//    $router->post('/change-password','AuthController@changePassword');
//
//    //TODO USER
//    RouterHelper::resource($router,'/users','UserController');
//
//    //TODO AIRPORT
//    RouterHelper::resource($router,'/airport','AirportController');
//    $router->post('/airport/import', 'AirportController@import');
//
//    //TODO AIRWAY
//    RouterHelper::resource($router,'/airway','AirwayController');
//    $router->post('/airway/detail','AirwayController@addAirwayDetail');
//
//    //TODO FLIGHT
//    RouterHelper::resource($router,'/flight','FlightController');
//    $router->post('/flight/detail','FlightController@addFlightDetail');
//    $router->get('/flight/search','FlightController@searchFlight');
//
//    //TODO PASSENGER
//    RouterHelper::resource($router,'/passenger','PassengerController');
//    $router->post('/booking','PassengerController@booking');
//
//    //TODO TICKET
//    RouterHelper::resource($router,'api/ticket','TicketController');
//
//});

