<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->get('news', 'NewsController@index');
    $router->post('news', 'NewsController@store');
    $router->get('news/create', 'NewsController@create');
    $router->get('news/{id}/edit', 'NewsController@edit');
    $router->put('news/{id}', 'NewsController@update');
    $router->delete('news/{id}', 'NewsController@destroy');

    $router->get('product', 'ProductController@index');
    $router->post('product', 'ProductController@store');
    $router->get('product/create', 'ProductController@create');
    $router->get('product/{id}/edit', 'ProductController@edit');
    $router->put('product/{id}', 'ProductController@update');
    $router->delete('product/{id}', 'ProductController@destroy');

    $router->get('homebanner', 'HomebannerController@index');
    $router->post('homebanner', 'HomebannerController@store');
    $router->get('homebanner/create', 'HomebannerController@create');
    $router->get('homebanner/{id}/edit', 'HomebannerController@edit');
    $router->put('homebanner/{id}', 'HomebannerController@update');
    $router->delete('homebanner/{id}', 'HomebannerController@destroy');
});
