<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'v1'], function () use ($router) {
        $router->group(['prefix' => 'auth'], function () use ($router) {
            $router->post('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);
            $router->group(['prefix' => 'login', 'middleware' => 'auth.basic'], function () use ($router) {
                $router->post('/', 'AuthController@login');
                $router->post('/remember', 'AuthController@remember');
            });
            $router->group(['prefix' => 'social'], function () use ($router) {
                $router->post('/apple', 'AuthController@socialApple');
                $router->post('/facebook', 'AuthController@socialFacebook');
                $router->post('/google', 'AuthController@socialGoogle');
            });
        });

        $router->group(['prefix' => 'users'], function () use ($router) {
            $router->post('/', ['middleware' => 'auth.basic', 'uses' => 'UserController@create']);
            $router->get('/', 'UserController@index');
            $router->get('/{id}', 'UserController@show');
            $router->put('/{id}', 'UserController@update');
            $router->delete('/{id}', 'UserController@delete');
        });

        $router->group(['prefix' => 'code', 'middleware' => 'auth'], function () use ($router) {
            $router->patch('/{code}', 'CodeController@validate');
        });

        $router->group(['prefix' => 'reserva', 'middleware' => 'auth'], function () use ($router) {
            $router->post('/', 'ReservasController@create');
            $router->get('/', 'ReservasController@index');
            $router->get('/{id}', 'ReservasController@show');
            $router->put('/{id}', 'ReservasController@update');
            $router->delete('/{id}', 'ReservasController@delete');
        });
    });
});
