<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'odc'], function() use($router) {
    $router->get('', 'OdcController@all');
    $router->get('{id}', 'OdcController@get');
    $router->post('', 'OdcController@add');
    $router->put('{id}', 'OdcController@put');
    $router->delete('{id}', 'OdcController@remove');
});

$router->group(['prefix' => 'users'], function() use($router) {
    $router->get('', 'UserController@all');
    $router->get('{id}', 'UserController@get');
    $router->post('', 'UserController@add');
    $router->put('{id}', 'UserController@put');
    $router->delete('{id}', 'UserController@remove');
});
