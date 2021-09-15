<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group( ['prefix' => 'tokoAPI'], function() use ($router) {
    
    $router->get('product', 'PmaProductController@index');
    $router->get('vendor', 'PmaVendorController@index');

    $router->get('product/{sku}', 'PmaProductController@show');
    $router->get('vendor/{id}', 'PmaVendorController@show');

    $router->put('product/{sku}', 'PmaProductController@update');
    $router->put('vendor/{id}', 'PmaVendorController@update');

    $router->post('product', 'PmaProductController@create');
    $router->post('vendor', 'PmaVendorController@create');

    $router->delete('product/delete/{sku}', 'PmaProductController@delete');
    $router->delete('vendor/delete/{id}', 'PmaVendorController@delete');
});