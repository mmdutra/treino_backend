<?php

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'auth', 'namespace' => 'Auth'], function () use ($router) {
        $router->post('login', 'AuthController@login');
    });

    $router->group(['middleware' => 'jwt.auth', 'namespace' => 'Products', 'prefix' => 'products'], function () use ($router) {
        $router->get('/', 'ProductsController@readAll');
    });

    $router->group(['middleware' => 'jwt.auth', 'namespace' => 'Order', 'prefix' => 'order'], function () use ($router) {
        $router->post('/', 'OrderController@create');
    });
});
